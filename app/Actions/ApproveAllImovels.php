<?php

namespace App\Actions;

use App\Models\Imovel;
use App\Support\Enums\SystemRoles;
use Illuminate\Console\Command;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsCommand;

class ApproveAllImovels
{
    use AsCommand;

    public string $commandSignature = 'imovel:approve';

    public function authorize(ActionRequest $request): bool
    {
        /** @var User $user */
        $user = $request->user();

        return $user->hasAnyRole(
            SystemRoles::SUPERADMIN,
            SystemRoles::ADMIN,
            SystemRoles::SUBADMIN
        );
    }

    public function handle()
    {
        Imovel::withoutApproved()->update([
            'approved' => true,
            'approved_at' => now(),
            'approved_by_id' => 1,
        ]);
    }

    public function asCommand(Command $command): void
    {
        try {
            $this->handle();
            $command->info('All properties are approved by administrator.');
        } catch (\Throwable $th) {
            $command->error('Error approving properties.');
        }
    }

    public function getCommandDescription(): string
    {
        return 'Approve all properties using super-admin role-permission.';
    }
}
