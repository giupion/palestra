<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('activities', compact('courses'));
    }
}
