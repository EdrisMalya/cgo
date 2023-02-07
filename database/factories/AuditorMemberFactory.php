<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditorMember>
 */
class AuditorMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => 'auditor_member_images/ML0ezeqSIUjUlnYwK2yl2CtcrrNf3uDtQrjGJIvV.jpg',
            'first_name' => fake()->firstName(),
            'last_name' => fake()->firstName(),
            'email' => fake()->firstName(),
            'phone_number' => fake()->firstName(),
        ];
    }
}
