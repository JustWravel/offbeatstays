<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $locationName = $this->faker->unique()->text(15);
        $slug = Str::slug($locationName);
        return [
            'name' => $this->faker->unique()->text(15),
            'slug' => Str::slug($this->faker->unique()->text(15)),
            'state_id' => State::factory(),
            'description' => $this->faker->text(160)
        ];
    }
}
