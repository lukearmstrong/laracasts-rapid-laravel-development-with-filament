<?php

namespace Database\Factories;

use App\Enums\RegionEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conference;
use App\Models\Venue;

class ConferenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conference::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company() . ' Conference ' . $this->faker->year(),
            'description' => $this->faker->text(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'is_published' => $this->faker->boolean(),
            'status' => $this->faker->word(),
            'region' => $this->faker->randomElement(RegionEnum::class),
            'venue_id' => Venue::factory(),
        ];
    }
}
