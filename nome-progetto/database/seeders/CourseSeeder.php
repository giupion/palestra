<?php
namespace Database\Seeders; // Correzione del namespace


// database/seeders/CourseSeeder.php
// database/seeders/CourseSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Creazione dei corsi
        Course::create([
            'name' => 'Pilates',
            'description' => 'Corso per migliorare la flessibilità e la forza muscolare',
        ]);

        Course::create([
            'name' => 'Yoga',
            'description' => 'Corso per il rilassamento e il benessere mentale e fisico',
        ]);

        Course::create([
            'name' => 'Jujitsu',
            'description' => 'Corso di arti marziali giapponesi focalizzato sulla difesa personale e le tecniche di lotta a terra',
        ]);

        Course::create([
            'name' => 'Taekwondo',
            'description' => 'Corso di arti marziali coreane che si concentra sui calci ad alta potenza e la padronanza del corpo',
        ]);

        Course::create([
            'name' => 'Aerobica',
            'description' => 'Sessioni di fitness ad alto impatto che combinano movimenti aerobici con musica ritmata per bruciare calorie e migliorare la resistenza',
        ]);

        Course::create([
            'name' => 'Culturismo',
            'description' => 'Programma di allenamento per lo sviluppo della massa muscolare e della definizione attraverso l\'uso di pesi e attrezzature di sollevamento',
        ]);
    }
}
