@extends('layouts.app')

@section('title')
    Data Kriteria
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Kriteria
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Kriteria</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('ksukses'))
            <div class="alert alert-success" role="alert" id="kriteria-success">
                {{ session('ksukses') }}
            </div>
        @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-success pull-right" data-toggle="modal"
                        data-target="#tambah">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </td>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="kriteria" class="table table-bordered table-hover table-responsive dataTable" role="grid"
                            aria-describedby="kriteria_info">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Bobot</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($kriteria))
                                    @foreach ($kriteria as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->kode }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->jenis }}</td>
                                            <td>{{ $data->bobot }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $data->id }}">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </button>
                                                <a href="/kriteria/hapus/{{ $data->id }}"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
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
                                                        <h4 class="modal-title" id="editLabel">Edit Data Kriteria</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/kriteria/update/{{ $data->id }}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="kode">Kode Kriteria</label>
                                                                <input type="text" class="form-control" name="kode"
                                                                    placeholder="Kode Kriteria"
                                                                    value="{{ $data->kode }}">
                                                                @if ($errors->has('kode'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('kode'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama">Nama Kriteria</label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    placeholder="Nama Kriteria"
                                                                    value="{{ $data->nama }}">
                                                                @if ($errors->has('nama'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('nama'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis">Jenis Kriteria</label>
                                                                <select type="text" class="form-control" name="jenis"
                                                                    placeholder="Jenis Kriteria"
                                                                    value="{{ $data->jenis }}">
                                                                    <option value="Benefit"
                                                                        {{ $data->jenis == 'Benefit' ? 'selected' : '' }}>
                                                                        Benefit</option>
                                                                    <option value="Cost"
                                                                        {{ $data->jenis == 'Cost' ? 'selected' : '' }}>
                                                                        Cost
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('jenis'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('jenis'))) }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bobot">Bobot Kriteria</label>
                                                                <input type="number" class="form-control" name="bobot"
                                                                    placeholder="Bobot Kriteria"
                                                                    value="{{ $data->bobot }}">
                                                                @if ($errors->has('bobot'))
                                                                    <div class="text-danger">
                                                                        {{ ucfirst(trans($errors->first('bobot'))) }}
                                                                    </div>
                                                                @endif
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
        <!-- Modal Tambah Data-->
        <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="tambahLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="tambahLabel">Tambah Data Kriteria</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/kriteria/tambah" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kode">Kode Kriteria <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('kode') }}" name="kode"
                                    placeholder="Kode Kriteria">
                                @if ($errors->has('kode'))
                                    <div class="text-danger">{{ ucfirst(trans($errors->first('kode'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Kriteria <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('nama') }}" name="nama"
                                    placeholder="Nama Kriteria">
                                @if ($errors->has('nama'))
                                    <div class="text-danger">{{ ucfirst(trans($errors->first('nama'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Kriteria <span class="text-danger">*</span></label>
                                <select class="form-control" name="jenis">
                                    <option value="" disabled selected>-- Pilih Jenis Kriteria --</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                                @if ($errors->has('jenis'))
                                    <div class="text-danger">{{ ucfirst(trans($errors->first('jenis'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot Kriteria <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" value="{{ old('bobot') }}" name="bobot"
                                    placeholder="Bobot Kriteria">
                                @if ($errors->has('bobot'))
                                    <div class="text-danger">{{ ucfirst(trans($errors->first('bobot'))) }}</div>
                                @endif
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#kriteria').DataTable()
            window.setTimeout(function() {
                $("#kriteria-success").alert('close');
            }, 1500);
        })

    </script>
@endsection
