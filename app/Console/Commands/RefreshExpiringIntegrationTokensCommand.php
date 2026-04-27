<?php

namespace App\Console\Commands;

use App\Application\Integration\Actions\RefreshIntegrationAccessToken;
use App\Enums\IntegrationProvider;
use App\Infrastructure\Integration\Repositories\IntegrationRepository;
use Illuminate\Console\Command;

final class RefreshExpiringIntegrationTokensCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integrations:refresh-expiring-tokens {--buffer=900 : Refresh tokens expiring within the given number of seconds}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh expiring access tokens for active calendar integrations';

    public function __construct(
        private readonly IntegrationRepository $integrations,
        private readonly RefreshIntegrationAccessToken $refreshIntegrationAccessToken,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $bufferSeconds = (int) $this->option('buffer');

        if ($bufferSeconds < 0) {
            $this->error('The buffer option must be zero or greater.');

            return self::FAILURE;
        }

        $integrations = $this->integrations->findExpiringCalendarIntegrations(
            provider: IntegrationProvider::Google,
            bufferSeconds: $bufferSeconds,
        );

        if ($integrations->isEmpty()) {
            $this->info('No expiring integration tokens found.');

            return self::SUCCESS;
        }

        $refreshedCount = 0;
        $failedCount = 0;

        foreach ($integrations as $integration) {
            try {
                ($this->refreshIntegrationAccessToken)($integration);
                $refreshedCount++;

                $this->line(sprintf(
                    'Refreshed integration #%d (%s).',
                    $integration->id,
                    $integration->email ?? $integration->provider_account_id ?? 'unknown'
                ));
            } catch (\Throwable $exception) {
                $failedCount++;

                $this->error(sprintf(
                    'Failed to refresh integration #%d: %s',
                    $integration->id,
                    $exception->getMessage()
                ));
            }
        }

        $this->newLine();
        $this->info(sprintf(
            'Token refresh finished. Refreshed: %d, Failed: %d.',
            $refreshedCount,
            $failedCount
        ));

        return $failedCount > 0 ? self::FAILURE : self::SUCCESS;
    }
}