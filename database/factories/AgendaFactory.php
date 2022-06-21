<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agenda;
use App\Models\Imovel;
use App\Models\User;

class AgendaFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Agenda::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'nome_do_cliente' => $this->faker->name,
            'local' => $this->faker->word,
            'contacto' => $this->faker->phoneNumber(),
            'data_hora' => $this->faker->dateTime(),
            'corretor_id' => User::all()->random(1)->first(),
            'mensagem' => $this->faker->text(125),
            'email' => $this->faker->safeEmail,
            'imovel_id' => Imovel::all()->random(3)->first(),
        ];
    }
}
