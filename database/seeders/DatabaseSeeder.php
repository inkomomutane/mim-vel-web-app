<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // $this->call(RolesTableSeeder::class);

        $admins = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => Str::random(7) . '@mimovel.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' =>'92IXUNpkjO0rOQ5byMi'
        ]);

        $admins->addMedia(storage_path('img.jpg'))
        ->toMediaCollection('Post');
         $admins->assignRole('Admin');
    }
}