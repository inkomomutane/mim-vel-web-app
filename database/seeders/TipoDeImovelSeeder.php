<?php

namespace Database\Seeders;

use App\Models\TipoDeImovel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        TipoDeImovel::insert([
            [
                'nome' => 'Geminada',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Mansão',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Apartamento',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Flat',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
