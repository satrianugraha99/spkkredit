<?php

namespace App\Http\Controllers;

use App\DetailPengajuan;
use App\Nasabah;
use App\Pengajuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
