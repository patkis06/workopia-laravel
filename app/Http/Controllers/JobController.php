<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(5);
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

    public function show(Job $job)
    {
        return view('pages.jobs.show', compact('job'));
    }

    public function saved()
    {
        return view('pages.jobs.saved');
    }

    public function edit(Job $job)
    {
        return view('pages.jobs.edit', compact('job'));
    }

    public function update(Job $job, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url'
        ]);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete old logo
            Storage::delete('public/logos/' . basename($job->company_logo));

            // Store the file and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $data['company_logo'] = $path;
        }

        // Update job
        $job->update($data);

        return redirect()->route('jobs.show', ['job' => $job->id])->with('success', 'Job listing updated successfully!');
    }

    public function destroy($id)
    {
        return redirect()->route('jobs.index');
    }
}
