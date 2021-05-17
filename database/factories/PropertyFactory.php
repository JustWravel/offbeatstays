<?php

namespace Database\Factories;

use App\Models\Property;
use App\Models\State;
use App\Models\Location;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'name' => $this->faker->unique()->text(70),
            'slug' => Str::slug($this->faker->unique()->text(70)),
            'state_id' => State::factory(10),
            'location_id' => Location::factory(25),
            // 'category_id' => Category::factory(),
            'description' => $this->faker->text(160)
        ];
    }
}
