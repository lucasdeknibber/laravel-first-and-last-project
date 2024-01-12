<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Handle profile picture upload
        if ($request->hasFile('avatar')) {
            // Store the profile picture and update the database field
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;

            // Optionally delete the old profile picture file if it exists
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
            }
        }

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Optionally delete the profile picture file if it exists
        if ($user->avatar) {
            \Storage::disk('public')->delete($user->avatar);
        }

        if (isset($data['birthday'])) {
            // Parse the date in the expected format 'd-m-Y'
            $parsedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $data['birthday']);
            $data['birthday'] = $parsedDate->format('Y-m-d');
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
