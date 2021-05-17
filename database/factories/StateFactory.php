<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = State::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $stateName = $this->faker->unique()->text(10);
        $slug = Str::slug($stateName);
        return [
            'name' => $this->faker->unique()->text(10),
            'slug' => Str::slug($this->faker->unique()->text(10)),
            'description' => $this->faker->text(160)
        ];
    }
}
