<?php

namespace App\Actions\Commands;

use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\AsCommand;
use Storage;

class BackupEmptyGoogleTrash
{
    use AsCommand;

    public string $commandSignature = 'backup-google:empty-trush';

    public function handle()
    {
        Storage::disk('google')->getAdapter()->emptyTrash([]);
    }

    public function asCommand(Command $command): void
    {
        try {
            $this->handle();
            $command->info('Google trush cleared!');
        } catch (\Throwable $th) {
            $command->error($th);
        }
    }

    public function getCommandDescription(): string
    {
        return 'Clear trash of google file system';
    }
}
