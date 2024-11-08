<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'avatar' => 'nullable|image',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatar', 'public');

            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'User updated successfully!');
    }
}
