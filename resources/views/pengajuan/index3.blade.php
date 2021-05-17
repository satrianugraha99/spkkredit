@extends('layouts.app')

@section('title')
    Data Pengajuan
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Pengajuan
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/nasabah">Nasabah</a></li>
            <li class="active">Data Pengajuan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('psukses'))
            <div class="alert alert-success" role="alert" id="pengajuan-success">
                {{ session('psukses') }}
            </div>
        @endif
        <!-- Default box -->
        <!-- Modal -->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="tambahLabel">Tambah Data Pengajuan</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/pengajuantambah" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="Pendapatan Per Bulan">Pendapatan Per Bulan</label>
                                <input type="number" class="form-control" name="pendapatan">
                                {{-- <select type="text" class="form-control" name="nilai[]">
                                        <option value="" disabled selected>-- Pilih Pendapatan Per Bulan --
                                        </option>
                                        <option value="3">> 3 Juta</option>
                                        <option value="2">≥ 1 Juta - ≤ 3 Juta</option>
                                        <option value="1">
                                            < 1 Juta</option>
                                    </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="Usia">Usia</label>
                                <input type="number" class="form-control" name="usia">
                                {{-- <select type="text" class="form-control" name="usia">
                                        <option value="" disabled selected>-- Pilih Usia --</option>
                                        <option value="3">
                                            ≥ 21 Tahun - ≤ 40 Tahun</option>
                                        <option value="2">≥ 41 Tahun - ≤ 60 Tahun</option>
                                        <option value="1">> 60 Tahun</option>
                                    </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="Pekerjaan">Pekerjaan</label>
                                <select type="text" class="form-control" name="pekerjaan">
                                    <option value="" disabled selected>-- Pilih Pekerjaan --</option>
                                    <option value="3">
                                        PNS</option>
                                    <option value="2">Wiraswasta</option>
                                    <option value="1">Pekerja Tidak Tetap</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Plapon Kredit">Plapon Kredit</label>
                                <input type="number" class="form-control" name="plapon">
                                {{-- <select type="text" class="form-control" name="nilai[]">
                                        <option value="" disabled selected>-- Pilih Plapon Kredit --</option>
                                        <option value="3">
                                            < 1 Juta</option>
                                        <option value="2">≥ 1 Juta - ≤ 3 Juta</option>
                                        <option value="1">
                                            > 3 Juta</option> 
                                    </select> --}}
                            </div>
                            <div class="form-group">
                                <label for="Jenis Penggunaan">Jenis Penggunaan</label>
                                <select type="text" class="form-control" name="penggunaan">
                                    <option value="" disabled selected>-- Pilih Jenis Penggunaan --</option>
                                    <option value="3">
                                        Modal Usaha</option>
                                    <option value="2">Investasi</option>
                                    <option value="1">Konsumtif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Jangka Waktu">Jangka Waktu</label>
                                <select type="text" class="form-control" name="jangka_waktu">
                                    <option value="" disabled selected>-- Pilih Jangka Waktu --</option>
                                    <option value="3">
                                        < 12 bulan</option>
                                    <option value="2">≥ 12 bulan - ≤ 24 bulan
                                    </option>
                                    <option value="1">
                                        ≥ 24 bulan - ≤ 36 bulan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Jaminan">Jaminan</label>
                                <select type="text" class="form-control" name="jaminan">
                                    <option value="" disabled selected>-- Pilih Jaminan --</option>
                                    <option value="3">
                                        Sertifikat Tanah</option>
                                    <option value="2">BPKB</option>
                                    <option value="1">Slip Gaji</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kondisi -->
        @if ($jumlah_pengajuan == 0)
            <div class="box">
                <div class="box-header with-border">
                    <td>
                        <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                            data-target="#tambah">
                            <i class="fa fa-plus"></i> Tambah Data
                        </button>
                    </td>
                </div>
            </div>
        @elseif($pengajuan->status_pengajuan == 'Sedang proses')
            <div class="box">
                <div class="box-header with-border">
                    <td>
                        <button type="button" class="btn btn-primary btn-success btn-detail" data-toggle="modal"
                            data-id="{{ $nasabah->pengajuan->id }}">
                            <i class="fa fa-eye"> Detail</i>
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="detailLabel">Detail Data Pengajuan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-stripped" id="table-detail">
                                            <thead>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Keterangan Nilai</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        {{-- @foreach ($pengajuan as $data) --}}
                                        Status Pengajuan Kredit : <strong> {{ $pengajuan->status_pengajuan }} </strong>
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </div>
            </div>
        @else
            <div class="box">
                <div class="box-header with-border">
                    <td>
                        @if ($pengajuan->status_peminjaman == 'Lunas')
                            <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                                data-target="#tambah">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        @elseif($pengajuan->status_peminjaman == 'Tahap Cicilan')
                            <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                                data-target="#modal-danger">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                            <div class="modal modal-danger fade" id="modal-danger">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <h4 class="modal-body text-center">
                                            <div style="font-size: 50px;">
                                                <i class="fa fa-warning"></i><br>
                                            </div>
                                            Mohon lunasi cicilan sebelumnya, agar bisa
                                            melakukan pengajuan berikutnya.
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-success btn-detail" data-toggle="modal"
                                data-id="{{ $pengajuan->id }}">
                                <i class="fa fa-eye"> Detail</i>
                            </button>
                        @else
                            <?php
                            // $tanggal_validasi = new DateTime('2021-05-02');
                            $tanggal_validasi = new DateTime($nasabah->pengajuan->tanggal_validasi);
                            $tanggal_sekarang = new DateTime();

                            $selisih = $tanggal_sekarang->diff($tanggal_validasi)->format('%a');

                            // echo $selisih;
                            ?>
                            @if ($selisih == 0)
                                <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                                    data-target="#tambah">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                            @else
                                <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                                    data-target="#modalbulan-danger">
                                    <i class="fa fa-plus"></i> Tambah Data
                                </button>
                                <div class="modal modal-danger fade" id="modal-danger">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <h4 class="modal-body text-center">Mohon tunggu <?= $selisih ?> hari untuk dapat melakukan
                                                pengajuan berikutnya.</h4>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endif
                            </td>
                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($pengajuan->status_pengajuan == 'Sedang proses')
                                    <div class="text-center">
                                        <strong>Pengajuan Anda Sedang di Proses</strong>
                                    </div>
                    @else
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="box">
                                            <div class="box">
                                                <strong>
                                                    <div class="text-center">
                                                        <h3>{{ $nasabah->nama }}</h3>
                                                    </div>
                                                </strong>
                                            </div>
                                            <div class="box-body">
                                                <div class="col-md-6">
                                                    <strong><i class="fa fa-id-card margin-r-5"></i> No. KTP</strong>
                                                    <p class="text-muted">{{ $nasabah->noKtp }}</p>
                                                    <strong><i class="fa fa-phone margin-r-5"></i> No. Telepon</strong>
                                                    <p class="text-muted">{{ $nasabah->noTelp }}</p>
                                                    <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Tanggal Pengajuan</strong>
                                                    <p class="text-muted">{{ $pengajuan->tanggal_pengajuan }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <strong><i class="fa fa-map margin-r-5"></i> Alamat</strong>
                                                    <p class="text-muted">{{ $nasabah->alamat }}</p>
                                                    <strong><i class="fa fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
                                                    <p class="text-muted">{{ $nasabah->jenisKelamin }}</p>
                                                    <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Tanggal Validasi</strong>
                                                    <p class="text-muted">{{ $pengajuan->tanggal_validasi }}</p>
                                                </div>
                                                <hr>
                                                <div class="col-md-12">
                                                    <strong>
                                                        <div class="text-center">
                                                            <h3>Status Pengajuan Kredit</h3>
                                                        </div>
                                                        <div class="text-center">
                                                            <h2>{{ $pengajuan->status_pengajuan }}</h2>
                                                        </div>
                                                    </strong>
                                                </div>
                                                @if ($pengajuan->status_pengajuan == 'Diterima')
                                                <div class="col-md-12">
                                                    <strong><i class="fa fa-check-circle-o"></i> Status Peminjaman :
                                                        {{ $pengajuan->status_peminjaman }}</strong>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                        <!-- Modal -->
                        <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="detailLabel">Detail Data Pengajuan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-stripped" id="table-detail">
                                            <thead>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Nilai</th>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                        {{-- @foreach ($pengajuan as $data) --}}
                                        Status Pengajuan Kredit : <strong> {{ $pengajuan->status_pengajuan }} </strong>
                                        {{-- @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </section>
                <!-- /.content -->
@endsection

@section('js')
                <script>
                    $(document).ready(function() {
                        $('#pengajuan').DataTable()
                        window.setTimeout(function() {
                            $("#pengajuan-success").alert('close');
                        }, 1500);

                        $('body').on('click', '.btn-detail', function() {
                            $('#detail').modal('show')
                            $('#table-detail tbody').empty()

                            let id = $(this).data('id')

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                url: '/pengajuandetail',
                                type: 'post',
                                data: {
                                    id: id
                                },
                                dataType: 'json',
                                success: function(response) {
                                    $.each(response, function(key, val) {
                                        // console.log(val.kriteria.nama)
                                        let tr_list = '<tr>' +
                                            '<td>' + (key + 1) + '</td>' +
                                            '<td>' + val.kriteria.nama + '</td>' +
                                            '<td>' + (val.ket_nilai) + '</td>'
                                        '</tr>'

                                        $('#table-detail tbody').append(tr_list)
                                    })
                                },
                                error: function(err) {
                                    console.log('Error', err)
                                }
                            })
                        })
                    })
                </script>
@endsection
