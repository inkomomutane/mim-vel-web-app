<?php

use App\Models\Bairro;
use App\Models\Cidade;
use App\Models\Denuncia;
use App\Models\Status;
use App\Models\User;
use App\Models\WebLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {/*
        $user = User::create(
            [
                'name' => 'Administrador',
                'email' => 'administrator@mimovel.com',
                'email_verified_at' => now(),
                'password' => Hash::make('#mimovel@2021@project#'),
                'remember_token' => Hash::make('password')
            ]
        );
        $data  = [
            ['url' => 'views', 'icon' => 'fa fa-eye'],
            ['url' => 'welcome', 'icon' => 'fa fa-home'],
            ['url' => 'contact', 'icon' => 'fa fa-phone'],
            ['url' => 'about', 'icon' => 'fa fa-info'],
            ['url' => 'complaint', 'icon' => 'fa fa-exclamation-triangle'],
        ];

        foreach ($data as $value) {
            WebLink::create($value);
        }

        $data = [
            ['nome' => 'Vendido'],
            ['nome' => 'Alugado'],
            ['nome' => 'Disponivel'],
        ];
        foreach ($data as $value) {
            Status::create($value);
        }

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $ceo =  Role::create([
            'name' => 'ceo',
        ]);
        $admin =    Role::create([
            'name' => 'admin',
        ]);
        $corretor =  Role::create([
            'name' => 'corretor',
        ]);
        //imoveis
        Permission::create([
            'name' => 'create post',
        ]);
        Permission::create([
            'name' => 'update post',
        ]);
        Permission::create([
            'name' => 'publish post',
        ]);

        Permission::create([
            'name' => 'delete post',
        ]);
        //usuarios
        Permission::create([
            'name' => 'create user',
        ]);
        Permission::create([
            'name' => 'update user',
        ]);
        Permission::create([
            'name' => 'delete user',
        ]);
        Permission::create([
            'name' => 'update ceo'
        ]);

        Permission::create([
            'name' => 'delete ceo',
        ]);
        Permission::create([
            'name' => 'create ceo',
        ]);

        Permission::create([
            'name' => 'create core data'
        ]);

        Permission::create([
            'name' => 'delete core data',
        ]);
        Permission::create([
            'name' => 'update core data',
        ]);

        //$permissions = Permission::all();
        $roles = Role::where('name', 'ceo')->get();

        //$ceo->permissions($permissions);
        $admin->givePermissionTo([
            'create post',
            'update post',
            'publish post',
            'delete post',
            'create user',
            'update user',
            'delete user',
            'create core data',
            'update core data',
            'delete core data',
        ]);
        $corretor->givePermissionTo([
            'create post',
            'update post',
            'delete post',
        ]);
        $user->syncRoles([$roles]);*/
        Denuncia::create([
            'denuncia'  => 'O imóvel é meu.'
        ]);
        Denuncia::create([
            'denuncia'  => 'Corretor falso'
        ]);
    }
}
