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
                'name' => 'Yoga Flow',
                'description' => 'Sessione di Yoga che combina movimenti fluidi e respirazione consapevole',
                'schedule' => 'Lunedì e Mercoledì, 18:00 - 19:00',
                'course_id' => 2, // Collega l'attività al corso di Yoga
            ]);
    
            Activity::create([
                'name' => 'Pilates Matwork',
                'description' => 'Allenamento di Pilates sul tappetino per migliorare la forza e la postura',
                'schedule' => 'Martedì e Giovedì, 10:00 - 11:00',
                'course_id' => 1, // Collega l'attività al corso di Pilates
            ]);
    
            Activity::create([
                'name' => 'Jujitsu Techniques',
                'description' => 'Lezioni pratiche su varie tecniche di Jujitsu per la difesa personale',
                'schedule' => 'Martedì e Venerdì, 19:00 - 20:30',
                'course_id' => 3, // Collega l'attività al corso di Jujitsu
            ]);
    
            Activity::create([
                'name' => 'Taekwondo Sparring',
                'description' => 'Allenamento pratico di Taekwondo che include sessioni di combattimento simulato',
                'schedule' => 'Mercoledì e Sabato, 17:30 - 19:00',
                'course_id' => 4, // Collega l'attività al corso di Taekwondo
            ]);
    
            Activity::create([
                'name' => 'Aerobic Dance',
                'description' => 'Sessioni di danza aerobica ad alta intensità per il miglioramento della resistenza cardiovascolare',
                'schedule' => 'Lunedì, Mercoledì e Venerdì, 20:00 - 21:00',
                'course_id' => 5, // Collega l'attività al corso di Aerobica
            ]);
    
            Activity::create([
                'name' => 'Bodybuilding Workout',
                'description' => 'Sessioni di allenamento focalizzate sullo sviluppo muscolare e la definizione del corpo',
                'schedule' => 'Lunedì, Martedì, Giovedì e Venerdì, 16:00 - 18:00',
                'course_id' => 6, // Collega l'attività al corso di Culturismo
            ]);

            // Aggiungi altre attività di esempio qui
        } else {
            // In caso non ci siano corsi nel database, stampa un messaggio di avviso
            echo "Nessun corso trovato nel database. Assicurati di creare almeno un corso prima di eseguire il seeder delle attività.";
        }
    }
}


