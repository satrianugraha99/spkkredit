@extends('layouts.app')

@section('title')
    Data Nasabah
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Nasabah
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="">Nasabah</a></li>
            <li class="active">Data Nasabah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('nsukses'))
            <div class="alert alert-success" role="alert" id="nasabah-success">
                {{ session('nsukses') }}
            </div>
        @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="nasabah" class="table table-bordered table-hover table-responsive dataTable" role="grid"
                            aria-describedby="nasabah_info">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>No. KTP</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Jenis Kelamin</th>
                                    {{-- <th class="text-center">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($nasabah))
                                    @foreach ($nasabah as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->noKtp }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->alamat }}</td>
                                            <td>{{ $data->noTelp }}</td>
                                            <td>{{ $data->jenisKelamin }}</td>
                                            {{-- <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $data->id }}">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </button>
                                            </td> --}}
                                        </tr>
                                        <!-- Modal Edit Data-->
                                        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="editLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="editLabel">Edit Biodata</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/nasabah/data_nasabah/update/{{ $data->id }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="noKTP">No. KTP</label>
                                                                <input type="text" class="form-control" name="noKtp"
                                                                    placeholder="Masukkan No. KTP Anda"
                                                                    value="{{ $data->noKtp }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Lengkap</label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    placeholder="Masukkan Nama Lengkap Anda"
                                                                    value="{{ $data->nama }}">
                                                                @if ($errors->has('nama'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('nama'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" class="form-control" name="alamat"
                                                                    placeholder="Masukkan Alamat sesuai KTP Anda"
                                                                    value="{{ $data->alamat }}">
                                                                @if ($errors->has('alamat'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('alamat'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="noTelp">No. Telepon</label>
                                                                <input type="number" class="form-control" name="noTelp"
                                                                    placeholder="Masukkan No. Telepon aktif Anda" size="13"
                                                                    value="{{ $data->noTelp }}">
                                                                @if ($errors->has('noTelp'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('noTelp'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenisKelamin">Jenis Kelamin</label>
                                                                <select class="form-control" name="jenisKelamin">
                                                                    <option value="Laki-Laki"
                                                                        {{ $data->jenisKelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                                                        Laki-laki
                                                                    </option>
                                                                    <option value="Perempuan"
                                                                        {{ $data->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>
                                                                        Perempuan
                                                                    </option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            $('#nasabah').DataTable()
            window.setTimeout(function() {
                $("#nasabah-success").alert('close');
            }, 1500);
        })

    </script>
@endsection
