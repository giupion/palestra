<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{
    public function dashboard()
    {
        $bookings = Booking::with('user', 'course')->get();
        return view('admin.dashboard', compact('bookings'));
    }

    public function adminIndex()
    {
        $bookings = Booking::with('user', 'course')->get();
        return view('admin.bookings.index', compact('bookings'));
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
}
