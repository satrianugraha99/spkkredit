@extends('layouts.app')

@section('title')
    Status Pengajuan
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Status Pengajuan
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="">Nasabah</a></li>
            <li class="active">Status Pengajuan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('sukses'))
            <div class="alert alert-success" role="alert" id="status-success">
                {{ session('sukses') }}
            </div>
        @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <td>

                </td>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="status_pengajuan" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="status_pengajuan_info">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Total Nilai</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Validasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td>No</td>
                                    <td>No. KTP</td>
                                    <td>Nama</td>
                                    <td>Alamat</td>
                                    <td>No. Telp</td>
                                    <td>Jenis Kelamin</td>
                                    <td>Total Nilai</td>
                                    <td>Diterima atau ditolak</td>
                                    <td class="text-center">
                                        <a href="/nasabah/status_pengajuan" class="btn btn-danger btn-sm">
                                            <i class="fa fa-arrow-up"> Post</i>
                                        </a>
                                    </td>
                                </tr> --}}
                                @if (!empty($pengajuan))
                                    @foreach ($pengajuan as $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->nasabah->nama }}</td>
                                            <td>{{ $p->nasabah->alamat }}</td>
                                            <td>{{ $p->nasabah->noTelp }}</td>
                                            <td>{{ $p->nasabah->jenisKelamin }}</td>
                                            <td>{{ $p->total_nilai }}
                                            <td>{{ $p->status_pengajuan }}</td>
                                            <td>{{ konversi_tanggal($p->tanggal_pengajuan) }}
                                            <td>{{ $p->tanggal_validasi == null ? 'Belum divalidasi' : konversi_tanggal($p->tanggal_validasi) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('#status_pengajuan').DataTable()
            window.setTimeout(function() {
                $("#status-success").alert('close');
            }, 1500);
        })

    </script>
@endsection
