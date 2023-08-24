<?php

namespace App\Actions\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Lorisleiva\Actions\Concerns\AsCommand;

class SeedUsersTree
{
    use AsCommand;

    public string $commandSignature = 'users-tree:generate';

    public function handle()
    {
        foreach (User::all() as $user) {
            /** @var User $user */
            if (is_null($user->created_by_id)) {
                $user->saveAsRoot();
            } else {
                $user->parent()->associate($user->createdBy)->save();
            }
        }
    }

    public function asCommand(Command $command): void
    {
        try {
            $this->handle();
            $command->info('Users tree generated successful!');
        } catch (\Throwable $th) {
            $command->error($th);
        }
    }

    public function getCommandDescription(): string
    {
        return 'Users tree generator';
    }
}
