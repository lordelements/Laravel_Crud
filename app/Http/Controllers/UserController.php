<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    // Register user function into database
    public function registeruser()
    {
        return view('user.create');
    }

    // Insert user function into database
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        
        return redirect('index')->with('status', 'User created successfully.');
    }

    // Display user function into table
    public function show()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    // Delete user function 
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('index')->with('success', 'User deleted successfully.');
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
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->update();
     
        return redirect('user.index')->with('success', 'Your data is updated successfully.');
    }

}
