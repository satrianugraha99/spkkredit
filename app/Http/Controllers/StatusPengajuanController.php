<?php

namespace App\Http\Controllers;

use App\DetailPengajuan;
use App\Nasabah;
use App\Nilai;
use App\Pengajuan;
use Illuminate\Http\Request;

class StatusPengajuanController extends Controller
{
    public function index()
    {
        // $nasabah = \App\Nasabah::where('user_id', auth()->user()->id)->get();
        $nasabah = Nasabah::all();
        $nilai = Nilai::all();
        $pengajuan = Pengajuan::all();
        $detail_pengajuan = DetailPengajuan::all();
        return view('status_pengajuan.index', ['pengajuan' => $pengajuan, 'nilai' => $nilai]);
        // dd(Pengajuan::with('detail_pengajuan')->get());
        // $user_id = auth()->user()->id;
        // $nasabah = Nasabah::where('user_id', $user_id)->first();
        // $pengajuan = Pengajuan::with('detail_pengajuan')->where('nasabah_id', $nasabah->id)->get();
        // $pengajuan = Pengajuan::where('nasabah_id', $nasabah->id)->get();
        // return view('status_pengajuan.index', ['nasabah' => $nasabah]);
    }
}
