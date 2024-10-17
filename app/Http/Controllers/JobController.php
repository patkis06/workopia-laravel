<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('pages.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('pages.jobs.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('jobs.index');
    }

    public function show()
    {
        return view('pages.jobs.show');
    }

    public function saved()
    {
        return view('pages.jobs.saved');
    }

    public function edit($id)
    {
        return view('pages.jobs.edit');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('jobs.index');
    }

    public function destroy($id)
    {
        return redirect()->route('jobs.index');
    }
}
