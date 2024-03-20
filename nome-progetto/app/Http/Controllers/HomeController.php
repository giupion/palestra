<?php

// HomeController.php

// HomeController.php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('activities')->get();
        return view('home', compact('courses'));
    }
    public function activities()
    {
        // Recupera tutte le attività disponibili
        $courses = Course::all();

        // Passa le attività alla vista
        return view('activities', compact('courses'));
    }
}

