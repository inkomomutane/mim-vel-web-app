<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::insert([
            [
                'nome' => 'Não Iniciado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Em construção',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Finalizado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
        );
    }
}
