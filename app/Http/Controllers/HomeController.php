<?php

namespace App\Http\Controllers;

use App\Models\Job;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('pages.home', compact('jobs'));
    }
}
