<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::insert([
            [
                'nome' => 'Maputo (Província)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Maputo (Cidade)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Xai-Xai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Vilanculos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Chimoio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Beira',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Tete',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Quelimane',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Nampula',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Lichinga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Pemba',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
        );
    }
}
