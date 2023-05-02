<?php

namespace Database\Seeders;

use App\Models\Bairro;
use App\Models\Cidade;
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
        Cidade::where('nome', 'Beira')->first()->bairros()->saveMany(
            [
                new Bairro([
                    'nome' => 'Macuti',
                ]),
                new Bairro([
                    'nome' => 'Palmeiras',
                ]),
                new Bairro([
                    'nome' => 'Ponta-Gêa',
                ]),
                new Bairro([
                    'nome' => 'Chaimite',
                ]),
                new Bairro([
                    'nome' => 'Pioneiros',
                ]),
                new Bairro([
                    'nome' => 'Esturro',
                ]),
                new Bairro([
                    'nome' => 'Matacuane',
                ]),
                new Bairro([
                    'nome' => 'Macurungo',
                ]),
                new Bairro([
                    'nome' => 'Munhava-Central',
                ]),
                new Bairro([
                    'nome' => 'Mananga',
                ]),
                new Bairro([
                    'nome' => 'Vaz',
                ]),
                new Bairro([
                    'nome' => 'Maraza',
                ]),
                new Bairro([
                    'nome' => 'Chota',
                ]), new Bairro([
                    'nome' => 'Alto da Manga',
                ]),
                new Bairro([
                    'nome' => 'Nhaconjua',
                ]),
                new Bairro([
                    'nome' => 'Chingussura',
                ]),
                new Bairro([
                    'nome' => 'Vila Massane',
                ]),
                new Bairro([
                    'nome' => 'Inhamízua',
                ]),
                new Bairro([
                    'nome' => 'Matadouro',
                ]),
                new Bairro([
                    'nome' => 'Mungassa',
                ]),
                new Bairro([
                    'nome' => 'Ndunda',
                ]), new Bairro([
                    'nome' => 'Manga Mascarenha',
                ]),
                new Bairro([
                    'nome' => 'Muave',
                ]),

                new Bairro([
                    'nome' => 'Nhangau',
                ]), new Bairro([
                    'nome' => 'Nhangoma',
                ]),
                new Bairro([
                    'nome' => 'Tchonja',
                ]),

            ]
        );
    }
}
