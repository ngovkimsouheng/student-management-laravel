<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SchoolClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create sample classes
        SchoolClass::create(['class_name' => 'Grade 6A', 'grade' => '6']);
        SchoolClass::create(['class_name' => 'Grade 6B', 'grade' => '6']);
        SchoolClass::create(['class_name' => 'Grade 7A', 'grade' => '7']);
        SchoolClass::create(['class_name' => 'Grade 7B', 'grade' => '7']);
        SchoolClass::create(['class_name' => 'Grade 8A', 'grade' => '8']);
        SchoolClass::create(['class_name' => 'Grade 8B', 'grade' => '8']);
        SchoolClass::create(['class_name' => 'Grade 9A', 'grade' => '9']);
        SchoolClass::create(['class_name' => 'Grade 9B', 'grade' => '9']);
        SchoolClass::create(['class_name' => 'Grade 10A', 'grade' => '10']);
        SchoolClass::create(['class_name' => 'Grade 10B', 'grade' => '10']);
        SchoolClass::create(['class_name' => 'Grade 11A', 'grade' => '11']);
        SchoolClass::create(['class_name' => 'Grade 12A', 'grade' => '12']);
    }
}
