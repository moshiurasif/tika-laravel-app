<?php

namespace Database\Factories;

use App\Models\Upazilla;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class VaccinationCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->address,
            'upazilla_id' => Upazilla::all()->random()->id,
            'vaccine_id' => Vaccine::all()->random()->id,
            'available' => 200,

        ];
    }
}
