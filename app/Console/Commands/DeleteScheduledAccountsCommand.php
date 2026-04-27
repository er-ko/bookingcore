<?php

namespace App\Console\Commands;

use App\Application\Auth\Actions\DeleteUserAccountAction;
use App\Models\User;
use Illuminate\Console\Command;
use Throwable;

final class DeleteScheduledAccountsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'accounts:delete-scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Permanently delete user accounts whose scheduled deletion time has passed.';

    /**
     * Execute the console command.
     */
    public function handle(DeleteUserAccountAction $deleteUserAccount): int
    {
        $deletedCount = 0;
        $failedCount = 0;

        User::query()
            ->whereNotNull('deletion_scheduled_for')
            ->where('deletion_scheduled_for', '<=', now())
            ->orderBy('id')
            ->chunkById(100, function ($users) use ($deleteUserAccount, &$deletedCount, &$failedCount): void {
                foreach ($users as $user) {
                    try {
                        $deleteUserAccount($user);
                        $deletedCount++;
                    } catch (Throwable $exception) {
                        $failedCount++;

                        report($exception);

                        $this->error(sprintf(
                            'Failed to delete user ID %d (%s).',
                            $user->id,
                            $user->email
                        ));
                    }
                }
            });

        $this->info(sprintf(
            'Scheduled account deletion completed. Deleted: %d. Failed: %d.',
            $deletedCount,
            $failedCount
        ));

        return $failedCount > 0
            ? self::FAILURE
            : self::SUCCESS;
    }
}