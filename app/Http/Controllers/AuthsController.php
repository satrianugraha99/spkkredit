<?php

namespace App\Http\Controllers;

use App\Nasabah;
use Auth;
use Illuminate\Http\Request;
use App\User;

class AuthsController extends Controller
{
    public function register()
    {
        return view('auths.register');
    }

    public function postregister(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus diisi dengan angka',
            'min' => ':attribute harus diisi minimal :min karakter',
            'unique' => ':attribute sudah digunakan'
        ];
        $this->validate($request, [
            'noKtp' => 'required|numeric|min:16|unique:nasabah',
            'nama' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'noTelp' => 'required|numeric|min:10',
            'alamat' => 'required',
            'password' => 'required',
            'jenisKelamin' => 'required'
        ], $messages);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'nasabah',
        ]);

        Nasabah::create([
            'user_id' => $user->id,
            'noKtp' => $request->noKtp,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'noTelp' => $request->noTelp,
            'jenisKelamin' => $request->jenisKelamin,
        ]);


        return redirect('/')->with('rsukses', 'User berhasil ditambah');
    }

    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        $messages = [
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], $messages);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function errorMessage()
    {
        return [
            'required' => ':attribute tidak boleh kosong.'
        ];
    }
}
