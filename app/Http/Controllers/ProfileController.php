<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\User;

use App\Models\AuditLog;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, string $id): Response
    {

        $user = User::find($id);

        return Inertia::render('Profile/Edit', [
            'user' => $user,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, string $id)
    {
        // validate name, email, password, password_confirmation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        $old_values = User::find($id);
        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        AuditLog::create([
            'type' => 'update',
            'description' => 'Ha actualitzat el seu perfil',
            'table_name' => 'users',
            'old_values' => json_encode($old_values),
            'new_values' => $request->user(),
            'user' => auth()->user(),
            'user_id' => auth()->id()
        ]);

        // update user's password
        if ($request->password) {
            $request->user()->update([
                'password' => bcrypt($request->password),
            ]);
        }

        // return Inertia::render('Profile/Edit', [
        //     'user' => $user,
        //     'status' => 'profile-information-updated'
        // ]);

        // redirect back with status
        return Redirect::back()->with('status', 'profile-information-updated');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
