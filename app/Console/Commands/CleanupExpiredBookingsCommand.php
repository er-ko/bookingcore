<?php

namespace App\Console\Commands;

use App\Enums\BookingStatus;
use App\Models\Booking\Booking;
use Illuminate\Console\Command;

final class CleanupExpiredBookingsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookings:cleanup-expired
                            {--dry-run : Show how many bookings would be removed without deleting them}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired pending and confirmed bookings from the database.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $statuses = [
            BookingStatus::Pending->value,
            BookingStatus::Confirmed->value,
        ];

        $baseQuery = Booking::query()
            ->whereIn('status', $statuses)
            ->where('ends_at', '<', now());

        $total = (clone $baseQuery)->count();

        if ($total === 0) {
            $this->info('No expired pending or confirmed bookings were found.');

            return self::SUCCESS;
        }

        if ($dryRun) {
            $this->info("Dry run: {$total} expired pending/confirmed booking(s) would be deleted.");

            return self::SUCCESS;
        }

        $deleted = 0;

        $this->info("Found {$total} expired pending/confirmed booking(s). Starting cleanup...");

        $baseQuery
            ->orderBy('id')
            ->chunkById(100, function ($bookings) use (&$deleted): void {
                foreach ($bookings as $booking) {
                    $booking->delete();
                    $deleted++;
                }
            });

        $this->info("Cleanup finished. Deleted {$deleted} booking(s).");

        return self::SUCCESS;
    }
}