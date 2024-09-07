<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{

    public function homepages() //routes for user homepages
    {
        return view('homepages');
    }

    public function loginuser() //routes for user loginpages
    {
        return view('/');
    }

    public function registeruser() //routes for regestrationpages
    {
        return view('register-pages');
    }


    public function store(Request $request) // Insert/registered user data function into database
    {
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        // $user = new User;
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = $request->input('password');
        // $user->save();

        return redirect('register-pages')->with('messages', 'Your account was created successfully.');
    }

    public function loginAcc(Request $request) // login process function 
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/homepages')->with('messages', 'You are now login.');
        }

        return back()->withErrors(['email' => 'Login failed.'])->onlyInput('email');
    }

    public function logoutUser(Request $request)
    { // Logout Process function for redirecting the user to homepages
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->back()->with('messages', 'You are now logout.');
    }

    // Display user function into table
    public function show()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    // Delete user account function from database table
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('messages', 'User deleted successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => [
                'required',
                'string',
                'min:6',             // must be at least 6 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ]);

        // $validated['password'] = bcrypt($validated['password']);
        // $user = User::create($validated);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->update();
        return redirect()->back()->with('messages', 'Your data is updated successfully.');
    }

    // View specific account information
    public function viewaccount(Request $request, $id)
    {
        $user = User::find($id);
        return view('user.viewUser', compact('user'));
    }
}
