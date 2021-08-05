<?php

use Illuminate\Database\Seeder;
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
    {
        factory(App\Models\User::class, 1)->create();

        factory(App\Models\Agenda::class, 15)->create();
          factory(App\Models\Bairro::class, 15)->create();
         factory(App\Models\Cidade::class, 15)->create();
          factory(App\Models\Comentario::class, 55)->create();
        factory(App\Models\Condicao::class, 15)->create();
        factory(App\Models\Denuncia::class, 15)->create();
        factory(App\Models\Foto::class, 15)->create();
        factory(App\Models\Video::class, 15)->create();
        factory(App\Models\Imovel::class, 35)->create();
        factory(App\Models\WebLink::class, 5)->create();


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
            'name' => 'update ceo']);

        Permission::create([
            'name' => 'delete ceo',
        ]);
        Permission::create([
            'name' => 'create ceo',
        ]);

        Permission::create([
            'name' => 'create core data']);

        Permission::create([
            'name' => 'delete core data',
        ]);
        Permission::create([
            'name' => 'update core data',
        ]);

        $permissions = Permission::all();

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
    }
}
