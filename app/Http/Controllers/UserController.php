<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function loginProcess(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'error' => 'Username atau password anda salah',
        ]);
    }

    public function profile()
    {
        return view('dashboard.profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|unique:users',
            'password' => 'required',
            'confirmpw' => 'required',
        ]);

        if($request->password != $request->confirmpw){
            return redirect('/register')->with('error', 'Password tidak sama')->withInput();
        }
        $user = new User([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return redirect()->route('user.login')->with('success', 'User berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update user
        $user = User::find($id);
        $user->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        $user->save();

        return back()->with('success', 'Profile berhasil diupdate');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::find($id);
        if($request->password != Auth::user()->password){
            return redirect()->route('home')->with('error', 'Password tidak sama')->withInput();
        }
        $user->update([
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        // tinggal kasih route
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // tinggal kasih route
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout Berhasil');
    }
}
