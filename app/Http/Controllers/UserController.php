<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->latest()
            ->get(['id', 'name', 'email']);

        return Inertia::render('Users/Index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create($validated);

        // Log the new user in and send them to the dashboard
        Auth::login($user);

        return redirect()->route('users.index')
            ->with('message', 'User created successfully.');
    }

    public function edit(User $user)
    {
        if (Auth::id() !== $user->id) {
            abort(403);
        }

        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if (Auth::id() !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('message', 'User updated successfully.');
    }

    public function destroy(Request $request, User $user)
    {
        $isCurrentUser = Auth::id() === $user->id;

        $user->delete();

        if ($isCurrentUser) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')
                ->with('message', 'Your account has been deleted.');
        }

        return redirect()->route('users.index')
            ->with('message', 'User deleted successfully.');
    }
}