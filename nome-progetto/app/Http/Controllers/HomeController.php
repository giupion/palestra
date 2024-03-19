<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::all(); // Otteniamo tutte le attività disponibili
        return view('home', compact('activities'));
    }
}
