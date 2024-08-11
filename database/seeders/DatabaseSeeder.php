<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\housesfiles;
use Illuminate\Database\Seeder;
use Database\Factories\housingFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
       
        $user=User::factory()->create([
            'name'=>'john doe',
            'email'=>'john@gmail.com'
        ]);
        housesfiles::factory(6)->create([
            'user_id'=>$user->id
        ]);

        // housesfiles::create([
        //     "title" => "Software Engineer",
        //     "tags" => "PHP, Laravel, JavaScript",
        //     "company" => "Tech Solutions Inc.",
        //     "location" => "San Francisco, CA",
        //     "email" => "contact@techsolutions.com",
        //     "website" => "https://www.techsolutions.com",
        //     "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
        // ]);

        // housesfiles::create([
        //     "title" => "Frontend Developer",
        //     "tags" => "HTML, CSS, React",
        //     "company" => "Creative Web Agency",
        //     "location" => "New York, NY",
        //     "email" => "jobs@creativeweb.com",
        //     "website" => "https://www.creativeweb.com",
        //     "description" => "Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit."
        // ]); 
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
