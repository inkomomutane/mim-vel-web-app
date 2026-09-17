<?php

namespace Database\Seeders;

use App\Models\Neighborhood;
use App\Models\City;
use Illuminate\Database\Seeder;

class BairroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::where('nome', 'Beira')->first()->bairros()->saveMany(
            [
                new Neighborhood([
                    'nome' => 'Macuti',
                ]),
                new Neighborhood([
                    'nome' => 'Palmeiras',
                ]),
                new Neighborhood([
                    'nome' => 'Ponta-Gêa',
                ]),
                new Neighborhood([
                    'nome' => 'Chaimite',
                ]),
                new Neighborhood([
                    'nome' => 'Pioneiros',
                ]),
                new Neighborhood([
                    'nome' => 'Esturro',
                ]),
                new Neighborhood([
                    'nome' => 'Matacuane',
                ]),
                new Neighborhood([
                    'nome' => 'Macurungo',
                ]),
                new Neighborhood([
                    'nome' => 'Munhava-Central',
                ]),
                new Neighborhood([
                    'nome' => 'Mananga',
                ]),
                new Neighborhood([
                    'nome' => 'Vaz',
                ]),
                new Neighborhood([
                    'nome' => 'Maraza',
                ]),
                new Neighborhood([
                    'nome' => 'Chota',
                ]), new Neighborhood([
                    'nome' => 'Alto da Manga',
                ]),
                new Neighborhood([
                    'nome' => 'Nhaconjua',
                ]),
                new Neighborhood([
                    'nome' => 'Chingussura',
                ]),
                new Neighborhood([
                    'nome' => 'Vila Massane',
                ]),
                new Neighborhood([
                    'nome' => 'Inhamízua',
                ]),
                new Neighborhood([
                    'nome' => 'Matadouro',
                ]),
                new Neighborhood([
                    'nome' => 'Mungassa',
                ]),
                new Neighborhood([
                    'nome' => 'Ndunda',
                ]), new Neighborhood([
                    'nome' => 'Manga Mascarenha',
                ]),
                new Neighborhood([
                    'nome' => 'Muave',
                ]),

                new Neighborhood([
                    'nome' => 'Nhangau',
                ]), new Neighborhood([
                    'nome' => 'Nhangoma',
                ]),
                new Neighborhood([
                    'nome' => 'Tchonja',
                ]),

            ]
        );
    }
}
