<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function show($id)
{
    $user = User::findOrFail($id); 
    return view('admin.users.show', compact('user'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    $user = new User();
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->password = bcrypt($validated['password']);
    $user->save();

    return redirect()->route('admin.users')->with('success', 'User created successfully.');
}
public function update(Request $request, User $user)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sync roles if provided
        if ($request->has('roles')) {
            $user->roles()->sync($request->roles);
        }

        // Redirect back with a success message
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }
    public function profile()
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('user.profile', compact('user'));
    }
    public function updateAvatar(Request $request)
{
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = Auth::user();

    // Delete old avatar if it exists
    if ($user->avatar && Storage::exists($user->avatar)) {
        Storage::delete($user->avatar);
    }

    // Store the new avatar
    $avatarPath = $request->file('avatar')->store('avatars', 'public');
    $user->avatar = $avatarPath;
    $user->save();

    // Refresh the authenticated user's data
    Auth::setUser($user);

    return redirect()->route('user.profile')->with('success', 'Profile picture updated successfully!');
}
}