<?php

namespace App\Http\Controllers;

use App\DetailPengajuan;
use App\Nasabah;
use App\Nilai;
use App\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $nasabah = Nasabah::with('pengajuan')->where('user_id', $user_id)->first();
        $pengajuan = Pengajuan::with('nasabah')->where('nasabah_id', $nasabah->id)->where('status_peminjaman', 'tahap cicilan')->first();
        $count_pengajuan = Pengajuan::with('nasabah')->where('nasabah_id', $nasabah->id)->where('status_pengajuan', 'sedang proses')->count();
        // dd($count_pengajuan);
        $tanpa_pengajuan = Pengajuan::where('nasabah_id', $nasabah->id)->count();
        // dd($tanpa_pengajuan);
        return view('pengajuan.index2', ['nasabah' => $nasabah, 'pengajuan' => $pengajuan, 'jumlah_pengajuan' => $count_pengajuan, 'tanpa_pengajuan' => $tanpa_pengajuan]);
    }

    public function riwayat()
    {
        $user_id = auth()->user()->id;
        $nasabah = Nasabah::where('user_id', $user_id)->first();
        $pengajuan = Pengajuan::where('nasabah_id', $nasabah->id)->get();
        // dd($pengajuan);
        return view('riwayat_pengajuan.index', ['pengajuan' => $pengajuan]);
    }

    public function create(Request $request)
    {
        $user_id = auth()->user()->id;
        $nasabah = Nasabah::where('user_id', $user_id)->first();

        $pendapatan = $request->pendapatan;
        $usia = $request->usia;
        $pekerjaan = $request->pekerjaan;
        $plapon = $request->plapon;
        $penggunaan = $request->penggunaan;
        $jangka_waktu = $request->jangka_waktu;
        $jaminan = $request->jaminan;

        try {
            insert_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan);
            return redirect()->back()->with('psukses', 'Data pengajuan berhasil ditambahkan');;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function detail(Request $request)
    {
        $pengajuan_id = $request->id;

        $detail_pengajuan = DetailPengajuan::with('kriteria')->where('pengajuan_id', $pengajuan_id)->get();

        echo json_encode($detail_pengajuan);
    }

    public function status_peminjaman()
    {
        $pengajuan = Pengajuan::where('status_pengajuan', 'Diterima')->get();
        return view('status_peminjaman.index', compact('pengajuan'));
    }

    public function update_status_peminjaman(Request $request)
    {
        $pengajuan_id = $request->pengajuan_id;
        $status_peminjaman = $request->status_peminjaman;
        $pengajuan = Pengajuan::find($pengajuan_id);

        $data = [
            'status_peminjaman' => $request->status_peminjaman
        ];

        // dd($request->keterangan);

        try {
            if ($status_peminjaman == 'Batal') {
                $data += [
                    'keterangan' => 'Dibatalkan oleh ' . $request->keterangan
                ];
                $pengajuan->update($data);
            } else {
                $data += [
                    'keterangan' => null
                ];
                $pengajuan->update($data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return redirect()->back()->with('upsukses', 'Status Pinjaman berhasil diupdate');
    }
}
