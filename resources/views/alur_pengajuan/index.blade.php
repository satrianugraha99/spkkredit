@extends('layouts.app')

@section('title')
    Alur Pengajuan
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Alur Pengajuan
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Alur Pengajuan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Dalam proses pengajuan kredit dengan Sistem Pendukung Keputusan Pemberian Kredit Pada LPD Desa
                            Adat
                            Intaran ini dapat dibagi menjadi beberapa tahap. Adapun alur proses pengajuan kredit dengan
                            menggunakan
                            sistem
                            ini yaitu:<br></h4>
                        1. Nasabah wajib melakukan registrasi pada Sistem Pendukung Keputusan Pemberian Kredit Pada LPD Desa
                        Adat Intaran.<br>
                        2. Proses login dapat dilakukan setelah Nasabah melakukan registrasi pada sistem.<br>
                        3. Mengisi formulir pengajuan kredit dengan jujur.<br>
                        4. Proses perhitungan formulir pengajuan kredit yang menggunakan perhitungan dari sistem.<br>
                        5. Petugas Bagian Kredit (Admin sistem) akan melakukan validasi terhadap proses perhitungan dari
                        sistem.<br>
                        6. Nasabah dimohonkan untuk selalu mengecek data pengajuan yang telah diajukan dalam sistem.<br>
                        7. Jika Nasabah memperoleh status pengajuan kredit diterima, maka Nasabah dapat melanjutkan proses
                        pengajuan kredit dengan menghubungi Petugas Bagian Kredit (Admin sistem). Nasabah yang memperoleh
                        status pengajuan kredit ditolak, Nasabah dapat melakukan pengajuan kembali dalam jangka waktu yang
                        ditentukan.

                    </div>
                </div>
            </div>
            <div class="box-body">
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
