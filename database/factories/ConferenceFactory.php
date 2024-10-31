<?php

namespace Database\Factories;

use App\Enums\RegionEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conference;
use App\Models\Venue;
use DateInterval;
use DateTimeImmutable;

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
        $start_date = $this->faker->dateTime();
        $start_date = DateTimeImmutable::createFromMutable($start_date);
        $end_date = $start_date->add(new DateInterval('P1D'));
        $status = $this->faker->randomElement(StatusEnum::class);
        $is_published = ($status === StatusEnum::PUBLISHED);
        $region = $this->faker->randomElement(RegionEnum::class);

        return [
            'name' => $this->faker->company() . ' Conference ' . $this->faker->year(),
            'description' => $this->faker->text(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'status' => $status,
            'is_published' => $is_published,
            'region' => $region,
            'venue_id' => Venue::factory(['region' => $region]),
        ];
    }
}
