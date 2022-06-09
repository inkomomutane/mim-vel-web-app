<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(BairroSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(TipoDeImovelSeeder::class);

        $admin = \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' =>  'Administrator@mimovel.com',
            'email_verified_at' => now(),
            'password' => Hash::make('#mimovel@2021@project#'), // password
            'remember_token' =>'92IXUNpkjO0rOQ5byMi'
        ]);
         $admin->assignRole('Super-Admin');
    }
}
