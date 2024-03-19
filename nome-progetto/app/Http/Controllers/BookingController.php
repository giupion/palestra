<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        $course = Course::findOrFail($id);
        return view('bookings.create', compact('course'));
    }

    public function store(Request $request)
    {
        // Validazione dei dati inviati dal form
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date_time' => 'required|date',
            // Altri campi di validazione
        ]);

        // Creazione della prenotazione
        Booking::create([
            'user_id' => auth()->id(), // ID dell'utente autenticato
            'course_id' => $request->course_id,
            'date_time' => $request->date_time,
            'status' => 'Pending', // Stato predefinito
        ]);

        // Redirect alla pagina delle attività con un messaggio di successo
        return redirect()->route('activities.index')->with('success', 'Prenotazione effettuata con successo!');
    }
}
