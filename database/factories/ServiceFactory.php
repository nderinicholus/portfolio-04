<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = ucwords($this->faker->word);
        $body = '';

        for($i=0; $i<5; $i++) {
            $body .= '<p class="mb-4">' . $this->faker->sentences(rand(5, 20), true) . '</p>';
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $body,
            'photo' => basename($this->faker->image(storage_path('app/public')))
        ];
    }
}
