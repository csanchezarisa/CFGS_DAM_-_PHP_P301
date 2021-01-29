<?php

namespace Database\Factories;

use App\Models\web;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class WebFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = web::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this->faker->url,
            'name' => $this->faker->domainWord,
            'description' => $this->faker->paragraph
        ];
    }
}
