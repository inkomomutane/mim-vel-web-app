<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Imovel;

class ImovelFactory extends Factory
{
    /**
    * The name of the factory's corresponding model.
    *
    * @var  string
    */
    protected $model = Imovel::class;

    /**
    * Define the model's default state.
    *
    * @return  array
    */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->realText(45),
            'descricao' => $this->faker->text(800),
            'banheiros' => $this->faker->randomNumber(1),
            'preco' => $this->faker->randomFloat(2,6000,40000),
            'ano' => $this->faker->randomNumber(4),
            'andares' => $this->faker->randomNumber(1),
            'area' => $this->faker->randomFloat(2,4,8),
            'quartos' => $this->faker->randomNumber(),
            'suites' => $this->faker->randomNumber(),
            'garagens' => $this->faker->randomNumber(),
            'piscinas' => $this->faker->randomNumber(),
            'endereco' => $this->faker->locale(),
            'mapa' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3079.3536064532254!2d-0.5681589851929298!3d39.483929319763114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6059925fd2e36f%3A0x3551b863d034fdca!2sMAFUSA!5e0!3m2!1spt-PT!2sus!4v1654776042527!5m2!1spt-PT!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'published_at' => $this->faker->dateTime(),
            'views' => $this->faker->randomNumber(2),
            'bairro_id' => \App\Models\Bairro::all()->random(1)->first(),
            'condicao_id' => \App\Models\Condicao::all()->random(1)->first(),
            'tipo_de_imovel_id' => \App\Models\TipoDeImovel::all()->random(1)->first(),
            'status_id' => \App\Models\Status::all()->random(1)->first(),
            'corretor_id' => \App\Models\User::all()->random(1)->first(),
            'slug' => $this->faker->slug(),
        ];


    }

        /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Imovel $imovel) {
            $imovel->addMediaFromUrl('https://picsum.photos/1080/420.jpg')
            ->withResponsiveImages()
            ->toMediaCollection('posts','posts');
        })->afterCreating(function (Imovel $imovel) {
            $imovel->addMediaFromUrl('https://picsum.photos/1080/420.jpg')
                       ->withResponsiveImages()
                       ->toMediaCollection('posts','posts');
        });
    }
}
