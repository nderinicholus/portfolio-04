<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence(rand(5,7));
            $content = '';

            for($i=0; $i<5; $i++) {
                $content .= '<p class="mb-4">' . $this->faker->sentences(rand(5, 20), true) . '</p>';
            }


        return [
            'title' => $title,
            'slug' => Str::slug($title . '-'),
            'content' => $content,
            'project_link' => $this->faker->url,
            'photo' => basename($this->faker->image(storage_path('app/public'))),
        ];
    }
}
