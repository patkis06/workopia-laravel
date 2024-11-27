<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobs = Job::where('user_id', $user->id)->with('applicants')->get();

        return view('pages.dashboard', compact('user', 'jobs'));
    }
}
