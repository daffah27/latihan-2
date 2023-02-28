<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register', ['title' => 'Register']);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required'],
            'nik' => ['required'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:8'],
           
        ]);

               
        $validated['level'] = 'masyarakat'; 
        $validated['password'] = bcrypt($validated['password']);
    
        
        user::create($validated);
        $request->session();
        return redirect('/login')->with('succes', 'daftar berhasil, silahkan login');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }
}
