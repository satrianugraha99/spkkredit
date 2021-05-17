<?php

namespace App\Http\Controllers;

use App\Nasabah;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $nasabah = Nasabah::where('user_id', $id)->first();

        // dd($nasabah);
        return view('profil.index', ['nasabah' => $nasabah], ['users' => $id]);
    }

    public function editProfil($id)
    {
        $user = \App\User::find($id);
        return view('/profil/editProfil', ['user' => $user]);
    }

    public function updateProfil(Request $request)
    {
        // $this->validate($request, [
        //     'old_password'     => 'required',
        //     'new_password'     => 'required|min:6',
        //     'confirm_password' => 'required|same:new_password',
        // ]);

        // $data = $request->all();

        // if(!\Hash::check($data['old_password'], auth()->user()->password)){

        //      return back()->with('error','You have entered wrong password');

        // }else{

        //    here you will write password update code

        // }
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'old_password' => 'required',
        //     'new_password' => 'required',
        //     'confirm_password' => 'required|same:new_password'
        // ], $this->errorMessage());
        // dd($request->all());
        $user = User::find(auth()->user()->id);
        // $user->update($request->all());

        // dd($user->password);
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'name' => $request->name,
                'password' => bcrypt($request->new_password)
            ]);
            return redirect('/')->with('upsukses', 'Profil berhasil diupdate');
        } else {
            return redirect()->back()->with('upgagal', 'Profil gagal diupdate');
        }
    }

    public function editBiodata($id)
    {
        $nasabah = \App\Nasabah::find($id);
        return view('/profil/editBiodata', ['nasabah' => $nasabah]);
    }

    public function updateBiodata(Request $request)
    {
        $this->validate($request, [
            'noKtp' => 'required|min:16|numeric',
            'nama' => 'required',
            'noTelp' => 'required|min:10|numeric',
            'alamat' => 'required',
            'jenisKelamin' => 'required'
        ], $this->errorMessage());
        // dd($request->all());
        $nasabah = \App\Nasabah::find($request->id);
        // $nasabah->update($request->all());
        $nasabah->update([
            'noKtp' => $request->noKtp,
            'nama' => $request->nama,
            'noTelp' => $request->noTelp,
            'alamat' => $request->alamat,
            'jenisKelamin' => $request->jenisKelamin
        ]);
        return redirect('/profil')->with('bsukses', 'Biodata berhasil diupdate');
    }

    public function errorMessage()
    {
        return [
            'required' => ':attribute tidak boleh kosong.'
        ];
    }
}
