<?php

namespace App\Http\Controllers;

use App\Mail\ApplicantMail;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resume', 'public');

            $data['resume_path'] = $path;
        }

        $application = new Applicant($data);
        $application->job_id = $job->id;
        $application->user_id = Auth::id();
        $application->save();

        Mail::to('patrik.kiss@bluedrm.com')->send(new ApplicantMail($application, $job));

        return redirect()->route('applicant.index', ['job' => $job->id])->with('success', 'You have applied to the job!');
    }

    public function destroy(Applicant $applicant)
    {
        if ($applicant->resume_path) {
            Storage::delete('public/logos/' . $applicant->resume_path);
        }

        $applicant->delete();

        return redirect()->route('dashboard')->with('success', 'Applicant has been removed!');
    }
}
