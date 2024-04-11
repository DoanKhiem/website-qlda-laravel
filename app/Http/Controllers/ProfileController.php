<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

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

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function users()
    {
        $datas = User::orderBy('created_at', 'desc')->get();
        return view('users.index', compact('datas'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'code' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'position' => ['required', 'integer'],
        ]);

        $status = User::create([
            'code' => $request->code,
            'position' => $request->position,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(12345678),
        ]);

        if ($status) {
            return redirect()->route('users.index')->with('success', 'Thêm mới nhân viên thành công');
        } else {
            return back()->with('error', 'Lỗi thêm mới nhân viên');
        }
    }
}
