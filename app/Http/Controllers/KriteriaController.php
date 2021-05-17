<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = \App\Kriteria::all();
        return view('kriteria.index', ['kriteria' => $kriteria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah digunakan',
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, [
            'kode' => 'required|unique:kriteria',
            'nama' => 'required|unique:kriteria',
            'jenis' => 'required',
            'bobot' => 'required'
        ], $messages);
        \App\Kriteria::create([
            'user_id' => 1,
            'kode' => $request->kode,
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'bobot' => $request->bobot,
        ]);
        return redirect('/kriteria')->with('ksukses', 'Data berhasil ditambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = \App\Kriteria::find($id);
        return view('/kriteria/edit', ['kriteria' => $kriteria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'unique' => ':attribute sudah digunakan',
            'required' => ':attribute tidak boleh kosong'
        ];
        $this->validate($request, [
            'kode' => 'required|unique:kriteria',
            'nama' => 'required|unique:kriteria',
            'jenis' => 'required',
            'bobot' => 'required'
        ], $messages);
        $kriteria = \App\Kriteria::find($id);
        $kriteria->update($request->all());
        return redirect('/kriteria')->with('ksukses', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        return redirect()->back()->with('ksukses', 'Data berhasil dihapus');
    }
}
