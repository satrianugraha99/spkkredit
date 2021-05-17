@extends('layouts.app')

@section('title')
    Profil
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profil
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Profil</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if (session('bsukses'))
            <div class="alert alert-success" role="alert" id="biodata-success">
                {{ session('bsukses') }}
            </div>
        @endif
        @if (session('upgagal'))
            <div class="alert alert-error" role="alert" id="profil-gagal">
                {{ session('upgagal') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <!-- Profile  -->
                <div class="box box-primary">
                    <div class="box-header">
                        <strong>
                            <div class="box-title">Biodata</div>
                        </strong>
                    </div>
                    <div class="box-body">
                        <img class="profile-user-img img-responsive img-circle" src="/img/logolpd_noborder.jpg"
                            alt="User profile picture">
                        <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                        <p class="text-muted text-center">{{ auth()->user()->email }}</p>
                        <strong><i class="fa fa-id-card margin-r-5"></i> No. KTP</strong>
                        <p class="text-muted">{{ $nasabah->noKtp }}</p>
                        <strong><i class="fa fa-user margin-r-5"></i> Nama Lengkap</strong>
                        <p class="text-muted">{{ $nasabah->nama }}</p>
                        <strong><i class="fa fa-map margin-r-5"></i> Alamat</strong>
                        <p class="text-muted">{{ $nasabah->alamat }}</p>
                        <strong><i class="fa fa-phone margin-r-5"></i> No. Telepon</strong>
                        <p class="text-muted">{{ $nasabah->noTelp }}</p>
                        <strong><i class="fa fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
                        <p class="text-muted">{{ $nasabah->jenisKelamin }}</p>
                        <button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal"
                            data-target="#edit{{ $nasabah->id }}">
                            Edit
                        </button>
                    </div>
                </div>
                <!-- /.box -->
                <!-- Modal Edit Data-->
                <div class="modal fade" id="edit{{ $nasabah->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="editLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="editLabel">Edit Biodata</h4>
                            </div>
                            <div class="modal-body">
                                <form action="/profil/updateBiodata/" method="post">
                                    {{ csrf_field() }}
                                    <input type="text" name="id" value="{{ $nasabah->id }}" hidden>
                                    <div class="form-group">
                                        <label for="noKTP">No. KTP</label>
                                        <input type="text" class="form-control" name="noKtp"
                                            placeholder="Masukkan No. KTP Anda" value="{{ $nasabah->noKtp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama"
                                            placeholder="Masukkan Nama Lengkap Anda" value="{{ $nasabah->nama }}">
                                        @if ($errors->has('nama'))
                                            <div class="text-danger">
                                                {{ ucfirst(trans($errors->first('nama'))) }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" name="alamat"
                                            placeholder="Masukkan Alamat Lengkap Anda" value="{{ $nasabah->alamat }}">
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
                                            value="{{ $nasabah->noTelp }}">
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
                                                {{ $nasabah->jenisKelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki
                                            </option>
                                            <option value="Perempuan"
                                                {{ $nasabah->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
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
            </div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <strong>
                            <div class="box-title">Edit Profil</div>
                        </strong>
                    </div>
                    <div class="box-body">
                        <form action="/profil/updateProfil/" method="post">
                            {{ csrf_field() }}
                            {{-- <input type="text" name="id" value="{{ auth()->user()->id }}"> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name='name' placeholder="Username"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" disabled="" name='email'
                                            placeholder="Email" value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password Sebelumnya</label>
                                        <input type="password" class="form-control" name='old_password'
                                            placeholder="Password Sebelumnya">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" name='new_password'
                                            placeholder="Password Baru">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" class="form-control" name='confirm_password'
                                            placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-round pull-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#biodata').DataTable()
            window.setTimeout(function() {
                $("#profil-gagal").alert('close');
            }, 1500);

            window.setTimeout(function() {
                $("#biodata-success").alert('close');
            }, 1500);
        })

    </script>
@endsection
