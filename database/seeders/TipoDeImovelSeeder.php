<?php

namespace Database\Seeders;

use App\Models\PropertyType;
use Illuminate\Database\Seeder;

class TipoDeImovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyType::insert([
            [
                'nome' => 'Geminada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Mansão',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Apartamento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Flat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
