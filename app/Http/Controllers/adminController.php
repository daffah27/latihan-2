<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('admin');
        return view('admin.akun', [
            'user' => user::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambah', [           
            'user' => user::all(),
        ]);
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
            'level' => ['required']
        ]);

               
        $validated['password'] = bcrypt($validated['password']);
    
        
        user::create($validated);
        $request->session();
        return redirect('/akun')->with('succes', 'daftar berhasil, silahkan login');
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
    public function edit($id)
    {
        
        $aidi = User::find($id);
        return view('admin.edit', [           
            'title' => 'Halaman Edit',
            'user' => $aidi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required'],
            'nik' => ['required'],
            'email' => ['required', 'email:dns'],
            'level' => ['required']
        ]);

        
        user::where('id', $id)->update($validated);
        $request->session();
        return redirect('/akun')->with('edit', 'Edit anda berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/akun');
    }


}
