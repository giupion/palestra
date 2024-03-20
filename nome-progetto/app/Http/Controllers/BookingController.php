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
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'date_time' => 'required|date',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id,
            'date_time' => $request->date_time,
            'status' => 'Pending',
        ]);

        // Reindirizza l'utente alla pagina del profilo
        return redirect()->route('profile')->with('success', 'Prenotazione effettuata con successo!');
    }
}

