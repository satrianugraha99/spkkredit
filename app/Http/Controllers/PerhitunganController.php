<?php

namespace App\Http\Controllers;

use App\DetailPengajuan;
use App\Nasabah;
use App\Kriteria;
use App\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function index(Request $request)
    {
        $kriteria = Kriteria::all();
        $nasabah = Pengajuan::with('nasabah')->where('status_pengajuan', 'Sedang proses')->get();
        $kode_krit = [];
        foreach ($kriteria as $krit) {
            $kode_krit[$krit->id] = [];
            foreach ($nasabah as $nsb) {
                foreach ($nsb->nilai as $nilai) {
                    if ($nilai->kriteria->id == $krit->id) {
                        $kode_krit[$krit->id][] = $nilai->nilai;
                    }
                }
            }

            // dd(count($kode_krit));

            if (count($nasabah) != 0) {
                if ($krit->jenis == 'Cost') {
                    $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
                } elseif ($krit->jenis == 'Benefit') {
                    $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
                }
            }
        }
        return view('perhitungan.index', [
            'kriteria'      => $kriteria,
            'nasabah'       => $nasabah,
            'kode_krit'     => $kode_krit,
            'count_data'     => count($nasabah)
        ]);
    }

    public function updateStatus(Request $request)
    {
        $total_nilai = $request->total_nilai;
        $status_pengajuan = $request->status_pengajuan;
        $nasabah_id = $request->nasabah_id;

        for ($i = 0; $i < count($total_nilai); $i++) {
            $status_pengajuan[$i] == 'Diterima' ? $status_peminjaman = 'Tahap Cicilan' : $status_peminjaman = '-';
            Pengajuan::where('id', $nasabah_id[$i])->update([
                'status_pengajuan' => $status_pengajuan[$i],
                'total_nilai' => $total_nilai[$i],
                'status_peminjaman' => $status_peminjaman,
                'tanggal_validasi' => date('Y-m-d')
            ]);
        }
        return redirect()->back();
    }
}
