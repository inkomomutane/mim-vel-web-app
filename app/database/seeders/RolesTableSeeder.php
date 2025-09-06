<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        /** @var User[] $users */
        $users = User::with('roles')->get();
        foreach ($users as $user) {

            if ($user->hasAnyRole('Visitor')) {
                $user->roles()->sync([5]);
            }
        }

        Role::whereName('Visitor')->delete();

        DB::table('roles')->updateOrInsert(
            [
                'id' => 1,
            ],
            [
                'id' => 1,
                'name' => 'Super-Admin',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ]
        );
        DB::table('roles')->updateOrInsert(
            [
                'id' => 2,
            ],
            [
                'id' => 2,
                'name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ]
        );

        DB::table('roles')->updateOrInsert(
            [
                'id' => 3,
            ],
            [
                'id' => 3,
                'name' => 'Sub-Admin',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ]
        );

        DB::table('roles')->updateOrInsert(
            [
                'id' => 4,
            ],
            [
                'id' => 4,
                'name' => 'Agencia-imobiliaria',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ]
        );

        DB::table('roles')->updateOrInsert(
            [
                'id' => 5,
            ],
            [
                'id' => 5,
                'name' => 'Agente-imobiliario',
                'guard_name' => 'web',
                'created_at' => '2022-01-31 15:59:59',
                'updated_at' => '2022-01-31 15:59:59',
            ]
        );

        User::whereId(1)?->first()?->roles()->sync([1]);
    }
}
