<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ["pending","ongoing","finished"];
        return [
            
          
                "title"=>$this->faker->word(10),
                "desc" =>$this->faker->sentence(),
                "status"=>$this->faker->randomElement($statuses),
                "deadline"=>$this->faker->date,
                "user_id"=> User::factory(),
                "assigned_user_id"=> User::factory()
            ];
        
    }
}
