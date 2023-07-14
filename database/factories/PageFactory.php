<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'content' => $this->faker->realText,
            'slogan' => $this->faker->text(120),
            'email' => $this->faker->freeEmail,
            'facebook' => $this->faker->url,
            'location' => $this->faker->address,
            'instagram' => $this->faker->url,
            'whatsapp' => $this->faker->url,
            'tiktok' => $this->faker->url,
            'contacts' => [$this->faker->phoneNumber, $this->faker->phoneNumber, $this->faker->phoneNumber],
        ];
    }
}
