<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function index(Job $job)
    {
        return view('pages.applicant.index', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        $data = request()->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'string',
            'contact_email' => 'required|string|email',
            'message' => 'string',
            'location' => 'string',
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        $data['user_id'] = Auth::id();
        $data['job_id'] = $job->id;

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resume', 'public');

            $data['resume_path'] = $path;
        }

        Applicant::create($data);

        return redirect()->route('applicant.index', ['job' => $job->id])->with('success', 'You have applied to the job!');
    }
}
