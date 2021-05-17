<?php

namespace App\Http\Controllers;

use App\User;
use App\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = auth()->user()->id;
        // $nasabah = Nasabah::where('user_id', $id)->first();

        // // dd($nasabah);
        // return view('nasabah.index', ['nasabah' => $nasabah]);
        $nasabah = Nasabah::all();
        return view('nasabah.index', ['nasabah' => $nasabah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nasabah = \App\Nasabah::find($id);
        return view('/nasabah/data_nasabah/edit', ['nasabah' => $nasabah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'noKtp' => 'required|min:16|numeric',
            'nama' => 'required',
            'noTelp' => 'required|min:10|numeric',
            'alamat' => 'required',
            'jenisKelamin' => 'required'
        ], $this->errorMessage());
        $nasabah = \App\Nasabah::find($id);
        $nasabah->update($request->all());
        return redirect('/nasabah/data_nasabah')->with('nsukses', 'Data berhasil diupdate');
        // $nasabah = \App\Nasabah::find($id);
        // $nasabah->update($request->all());
        // return redirect('/nasabah/data_nasabah')->with('nsukses', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $nasabah = Nasabah::find($id);
        // $nasabah->delete();
        // return redirect()->back()->with('nsukses', 'Data berhasil dihapus');
    }

    public function errorMessage()
    {
        return [
            'required' => ':attribute tidak boleh kosong.'
        ];
    }
}
