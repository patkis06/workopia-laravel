<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobs = Auth::user()->jobs->take(5)->sortByDesc('created_at');

        return view('pages.dashboard', compact('user', 'jobs'));
    }
}
