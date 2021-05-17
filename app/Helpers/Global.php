<?php

use App\DetailPengajuan;
use App\Pengajuan;
use App\Nasabah;
use App\Kriteria;

function totalNasabah()
{
    return Nasabah::count();
}
function totalPengajuan()
{
    return Pengajuan::count();
}
function totalKriteria()
{
    return Kriteria::count();
}
function totalDiterima()
{
    return Pengajuan::where('status_pengajuan', 'Diterima')->count();
}
function totalDitolak()
{
    return Pengajuan::where('status_pengajuan', 'Ditolak')->count();
}

function konversi_tanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)
{
    if ($pendapatan < 1000000) {
        $nilai_pendapatan = 1;
        $keterangan_pendapatan = $pendapatan;
        $kriteria_pendapatan = 1;
    } elseif ($pendapatan <= 3000000) {
        $nilai_pendapatan = 2;
        $keterangan_pendapatan = $pendapatan;
        $kriteria_pendapatan = 1;
    } else {
        $nilai_pendapatan = 3;
        $keterangan_pendapatan = $pendapatan;
        $kriteria_pendapatan = 1;
    }

    if ($usia < 41) {
        $nilai_usia = 3;
        $keterangan_usia = $usia . ' tahun';
        $kriteria_usia = 2;
    } elseif ($usia <= 60) {
        $nilai_usia = 2;
        $keterangan_usia = $usia . ' tahun';
        $kriteria_usia = 2;
    } else {
        $nilai_usia = 1;
        $keterangan_usia = $usia . ' tahun';
        $kriteria_usia = 2;
    }

    if ($pekerjaan == 3) {
        $nilai_pekerjaan = 3;
        $keterangan_pekerjaan = 'PNS';
        $kriteria_pekerjaan = 3;
    } elseif ($pekerjaan == 2) {
        $nilai_pekerjaan = 2;
        $keterangan_pekerjaan = 'Wiraswasta';
        $kriteria_pekerjaan = 3;
    } else {
        $nilai_pekerjaan = 1;
        $keterangan_pekerjaan = 'Pekerja tidak tetap';
        $kriteria_pekerjaan = 3;
    }

    if ($plapon < 1000000) {
        $nilai_plapon = 3;
        $keterangan_plapon = $plapon;
        $kriteria_plapon = 4;
    } elseif ($plapon <= 3000000) {
        $nilai_plapon = 2;
        $keterangan_plapon = $plapon;
        $kriteria_plapon = 4;
    } else {
        $nilai_plapon = 1;
        $keterangan_plapon = $plapon;
        $kriteria_plapon = 4;
    }

    if ($penggunaan == 3) {
        $nilai_penggunaan = 3;
        $keterangan_penggunaan = 'Modal usaha';
        $kriteria_penggunaan = 5;
    } elseif ($penggunaan == 2) {
        $nilai_penggunaan = 2;
        $keterangan_penggunaan = 'Investasi';
        $kriteria_penggunaan = 5;
    } else {
        $nilai_penggunaan = 1;
        $keterangan_penggunaan = 'Konsumtif';
        $kriteria_penggunaan = 5;
    }

    if ($jangka_waktu == 3) {
        $nilai_jangka_waktu = 3;
        $keterangan_jangka_waktu = '< 12 bulan';
        $kriteria_jangka_waktu = 6;
    } elseif ($jangka_waktu == 2) {
        $nilai_jangka_waktu = 2;
        $keterangan_jangka_waktu = '≥ 12 bulan - ≤ 24 bulan';
        $kriteria_jangka_waktu = 6;
    } else {
        $nilai_jangka_waktu = 1;
        $keterangan_jangka_waktu = '≥ 24 bulan - ≤ 36 bulan';
        $kriteria_jangka_waktu = 6;
    }

    if ($jaminan == 3) {
        $nilai_jaminan = 3;
        $keterangan_jaminan = 'Sertifikat tanah';
        $kriteria_jaminan = 7;
    } elseif ($jaminan == 2) {
        $nilai_jaminan = 2;
        $keterangan_jaminan = 'BPKB';
        $kriteria_jaminan = 7;
    } else {
        $nilai_jaminan = 1;
        $keterangan_jaminan = 'Slip gaji';
        $kriteria_jaminan = 7;
    }

    return [
        'nilai_pendapatan' => $nilai_pendapatan,
        'keterangan_pendapatan' => $keterangan_pendapatan,
        'kriteria_pendapatan' => $kriteria_pendapatan,

        'nilai_usia' => $nilai_usia,
        'keterangan_usia' => $keterangan_usia,
        'kriteria_usia' => $kriteria_usia,

        'nilai_pekerjaan' => $nilai_pekerjaan,
        'keterangan_pekerjaan' => $keterangan_pekerjaan,
        'kriteria_pekerjaan' => $kriteria_pekerjaan,

        'nilai_plapon' => $nilai_plapon,
        'keterangan_plapon' => $keterangan_plapon,
        'kriteria_plapon' => $kriteria_plapon,

        'nilai_penggunaan' => $nilai_penggunaan,
        'keterangan_penggunaan' => $keterangan_penggunaan,
        'kriteria_penggunaan' => $kriteria_penggunaan,

        'nilai_jangka_waktu' => $nilai_jangka_waktu,
        'keterangan_jangka_waktu' => $keterangan_jangka_waktu,
        'kriteria_jangka_waktu' => $kriteria_jangka_waktu,

        'nilai_jaminan' => $nilai_jaminan,
        'keterangan_jaminan' => $keterangan_jaminan,
        'kriteria_jaminan' => $kriteria_jaminan,
    ];
}

function insert_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)
{
    $user_id = auth()->user()->id;
    $nasabah = Nasabah::where('user_id', $user_id)->first();
    nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan);

    $pengajuan = Pengajuan::create([
        'nasabah_id' => $nasabah->id,
        'tanggal_pengajuan' => date('Y-m-d'),
        'status_pengajuan' => 'Sedang proses',
    ]);

    if ($pengajuan) {
        $insertPendapatan = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_pendapatan'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_pendapatan'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_pendapatan'],
        ]);

        $insertUsia = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_usia'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_usia'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_usia'],
        ]);

        $insertPekerjaan = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_pekerjaan'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_pekerjaan'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_pekerjaan'],
        ]);

        $insertPlapon = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_plapon'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_plapon'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_plapon'],
        ]);

        $insertPenggunaan = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_penggunaan'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_penggunaan'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_penggunaan'],
        ]);

        $insertJangkaWaktu = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_jangka_waktu'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_jangka_waktu'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_jangka_waktu'],
        ]);

        $insertJaminan = DetailPengajuan::create([
            // 'nasabah_id' => $nasabah->id,
            'pengajuan_id' => $pengajuan->id,
            'kriteria_id' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['kriteria_jaminan'],
            'nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['nilai_jaminan'],
            'ket_nilai' => nilai_pengajuan($pendapatan, $usia, $pekerjaan, $plapon, $penggunaan, $jangka_waktu, $jaminan)['keterangan_jaminan'],
        ]);
    }
}


function status_diterima_count()
{
    $status_diterima = Pengajuan::where('status_pengajuan', 'Diterima')->count();

    return $status_diterima;
}

function status_ditolak_count()
{
    $status_ditolak = Pengajuan::where('status_pengajuan', 'Ditolak')->count();

    return $status_ditolak;
}

function pendapatan_count($value)
{
    $pendapatan = DetailPengajuan::where('kriteria_id', 1)
        ->where('nilai', $value)->count();

    return $pendapatan;
}

function usia_count($value)
{
    $usia = DetailPengajuan::where('kriteria_id', 2)
        ->where('nilai', $value)->count();

    return $usia;
}

function pekerjaan_count($value)
{
    $pekerjaan = DetailPengajuan::where('kriteria_id', 3)
        ->where('nilai', $value)->count();

    return $pekerjaan;
}

function plapon_count($value)
{
    $plapon = DetailPengajuan::where('kriteria_id', 4)
        ->where('nilai', $value)->count();

    return $plapon;
}

function penggunaan_count($value)
{
    $penggunaan = DetailPengajuan::where('kriteria_id', 5)
        ->where('nilai', $value)->count();

    return $penggunaan;
}

function jangka_waktu_count($value)
{
    $jangka_waktu = DetailPengajuan::where('kriteria_id', 6)
        ->where('nilai', $value)->count();

    return $jangka_waktu;
}

function jaminan_count($value)
{
    $jaminan = DetailPengajuan::where('kriteria_id', 7)
        ->where('nilai', $value)->count();

    return $jaminan;
}
