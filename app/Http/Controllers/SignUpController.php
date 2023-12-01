<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.sign-up');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
        $validationData = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:8', 'max:25', 'regex:'.$passwordRegex],
            'confirmPassword' => ['required', 'same:password']
        ]);
        if ($validationData) {
            DB::table('users')->insert([
                'email' => $request->email,
                'username' => $request->username,
                'password' => $request->password,
                'role' => 0,
                'is_active' => 1
            ]);
            
            return redirect()->route('sign-in')->with('success', 'User created successfully!');
        }

        return redirect()->back()->withErrors($validationData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
