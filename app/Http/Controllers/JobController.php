<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $jobs = Job::paginate(6);
        return view('pages.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('pages.jobs.create');
    }

    public function store(Request $request)
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

        $data['user_id'] = 1;

        if ($request->hasFile('company_logo')) {
            $path = $request->file('company_logo')->store('logos', 'public');

            $data['company_logo'] = $path;
        }

        Job::create($data);

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully!');
    }

    public function show(Job $job)
    {
        $bookmarkedJobs = [];
        if (Auth::check()) {
            $bookmarkedJobs = Auth::user()->bookmarkedJobs->pluck('id')->toArray();
        }

        return view('pages.jobs.show', compact('job', 'bookmarkedJobs'));
    }

    public function saved()
    {
        $jobs = User::find(Auth::id())->bookmarkedJobs()->orderBy('bookmark_user.created_at', 'desc')->paginate(9);

        return view('pages.jobs.saved', compact('jobs'));
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        return view('pages.jobs.edit', compact('job'));
    }

    public function update(Job $job, Request $request)
    {
        $this->authorize('update', $job);

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

        if ($request->hasFile('company_logo')) {
            Storage::delete('public/logos/' . basename($job->company_logo));

            $path = $request->file('company_logo')->store('logos', 'public');

            $data['company_logo'] = $path;
        }

        $job->update($data);

        return redirect()->route('jobs.show', ['job' => $job->id])->with('success', 'Job listing updated successfully!');
    }

    public function destroy(Job $job, Request $request)
    {
        $this->authorize('delete', $job);

        if ($job->company_logo) {
            Storage::delete('public/logos/' . $job->company_logo);
        }

        $job->delete();

        if ($request->query('redirect')) {
            return redirect($request->query('redirect'))->with('success', 'Job listing deleted successfully!');
        }

        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully!');
    }

    public function search(Request $request)
    {
        $data = $request->validate([
            'keywords' => 'nullable|string',
            'location' => 'nullable|string'
        ]);

        $query = Job::query();

        if ($data['keywords']) {
            $query->where('title', 'like', '%' . $data['keywords'] . '%')
                ->orWhere('description', 'like', '%' . $data['keywords'] . '%')
                ->orWhere('tags', 'like', '%' . $data['keywords'] . '%')
                ->orWhere('requirements', 'like', '%' . $data['keywords'] . '%')
                ->orWhere('benefits', 'like', '%' . $data['keywords'] . '%')
                ->orWhere('company_name', 'like', '%' . $data['keywords'] . '%');
        }

        if ($data['location']) {
            $query->where('city', 'like', '%' . $data['location'] . '%')
                ->orWhere('state', 'like', '%' . $data['location'] . '%')
                ->orWhere('zipcode', 'like', '%' . $data['location'] . '%');
        }

        $jobs = $query->paginate(6);

        return view('pages.jobs.index', compact('jobs'));
    }

    /**
     * Bookmark a job listing
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function bookmarkJob(Job $job)
    {
        $user = User::find(Auth::id());

        $user->bookmarkedJobs()->attach($job->id);

        return redirect()->back()->with('success', 'Job listing saved successfully!');
    }

    /**
     * Remove a bookmarked job listing
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function unBookmarkJob(Job $job)
    {
        $user = User::find(Auth::id());

        $user->bookmarkedJobs()->detach($job->id);

        return redirect()->back()->with('success', 'Job listing removed successfully!');
    }
}
