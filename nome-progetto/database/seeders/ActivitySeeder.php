<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activity;
use App\Models\Course;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        $course = Course::first(); // Ottieni il primo corso nel database

        if ($course) { // Verifica se il corso è stato recuperato correttamente
            Activity::create([
                'name' => 'Yoga',
                'description' => 'Practice yoga for physical and mental well-being.',
                'schedule' => 'Monday 10:00 AM - 11:00 AM',
                'course_id' => $course->id, // Assegna l'ID del corso alla nuova attività
            ]);

            Activity::create([
                'name' => 'Pilates',
                'description' => 'Strengthen your core and improve flexibility with Pilates exercises.',
                'schedule' => 'Wednesday 5:00 PM - 6:00 PM',
                'course_id' => $course->id, // Assegna l'ID del corso alla nuova attività
            ]);

            // Aggiungi altre attività di esempio qui
        } else {
            // In caso non ci siano corsi nel database, stampa un messaggio di avviso
            echo "Nessun corso trovato nel database. Assicurati di creare almeno un corso prima di eseguire il seeder delle attività.";
        }
    }
}


