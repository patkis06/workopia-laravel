<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(User $user, Request $request)
    {
        dd($user);
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

        $user->update($data);

        return redirect()->route('jobs.show', ['job' => $job->id])->with('success', 'Job listing updated successfully!');
    }
}
