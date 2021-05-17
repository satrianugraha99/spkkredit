<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Nilai;
use \App\Nasabah;
use \App\Pengajuan;
use App\User;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // $nasabah = \App\Nasabah::all();
        // $pengajuan = \App\Pengajuan::all();

        // $categories = [];

        // foreach ($pengajuan as $p) {
        //     $categories[] = $p->status;
        // }

        // dd(json_encode($categories));

        return view('/laporan_pengajuan.index');
    }
}
