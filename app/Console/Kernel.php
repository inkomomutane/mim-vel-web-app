<?php

namespace App\Console;

use App\Actions\ApproveAllImovels;
use App\Actions\Commands\BackupEmptyGoogleTrash;
use App\Actions\Commands\SeedUsersTree;
use App\Actions\SitemapGeneratorCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        SitemapGeneratorCommand::class,
        ApproveAllImovels::class,
        SeedUsersTree::class,
        BackupEmptyGoogleTrash::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
