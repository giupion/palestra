<?php

// CourseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        Course::create([
            'name' => 'Beginner Yoga Course',
            'description' => 'Introduction to basic yoga poses and breathing techniques.',
            'schedule' => 'Monday 9:00 AM - 18:00 AM',]);

        Course::create([
            'name' => 'Advanced Pilates Course',
            'description' => 'Advanced Pilates workout for experienced practitioners.',
            'schedule' => 'Wednesday 9:00 PM - 15:00 PM', ]);

        // Aggiungi altri corsi di esempio qui
    }
}

