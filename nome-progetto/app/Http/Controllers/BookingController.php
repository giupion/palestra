<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Course;
use Illuminate\Http\Request;

class BookingController extends Controller
{


    public function index()
    {
        $bookings = Booking::with('user', 'course')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function accept(Request $request, Booking $booking)
    {
        $booking->status = 'Accepted';
        $booking->save();
        return redirect()->back()->with('success', 'Prenotazione accettata con successo!');
    }

    public function reject(Request $request, Booking $booking)
    {
        $booking->status = 'Rejected';
        $booking->save();
        return redirect()->back()->with('success', 'Prenotazione respinta con successo!');
    }
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

    public function destroy(Booking $booking)
    {
        // Verifica che l'utente autenticato sia il proprietario della prenotazione
        if ($booking->user_id === auth()->id()) {
            $booking->delete();
            return redirect()->route('profile')->with('success', 'Prenotazione annullata con successo!');
        }

        return redirect()->route('profile')->with('error', 'Non hai i permessi per annullare questa prenotazione.');
    }
    
}

