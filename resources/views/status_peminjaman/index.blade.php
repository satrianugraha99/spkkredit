@extends('layouts.app')

@section('title')
    Status Peminjaman
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Status Peminjaman
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/nasabah">Nasabah</a></li>
            <li class="active">Status Peminjaman</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('upsukses'))
            <div class="alert alert-success" role="alert" id="nasabah-success">
                {{ session('upsukses') }}
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
                                    <th>Nama Nasabah</th>
                                    <th>Status Peminjaman</th>
                                    <th>Tanggal Diperbaharui</th>
                                    <th>Keterangan</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan as $data)
                                    <?php $explode = explode(' ', $data->updated_at); ?>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nasabah->nama }}</td>
                                        <td>{{ $data->status_peminjaman }}</td>
                                        <td>{{ konversi_tanggal($explode[0]) }}</td>
                                        <td>{{ $data->keterangan == null ? '-' : $data->keterangan }}</td>
                                        <td class="text-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-success btn-update"
                                                data-toggle="modal" data-target="#update{{ $data->id }}">
                                                <i class="fa fa-eye"> Detail</i>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="update{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="updateLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="updateLabel">Update Status Peminjaman</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update.status_peminjaman') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <input type="text" value="{{ $data->id }}"
                                                                name="pengajuan_id" hidden>
                                                            <label for="Status Peminjaman">Status Peminjaman</label>
                                                            <select class="form-control status_peminjaman"
                                                                data-id="{{ $data->id }}" name="status_peminjaman">
                                                                <option value="Tahap Cicilan"
                                                                    {{ $data->status_peminjaman == 'Tahap Cicilan' ? 'selected' : '' }}>
                                                                    Tahap Cicilan
                                                                </option>
                                                                <option value="Lunas"
                                                                    {{ $data->status_peminjaman == 'Lunas' ? 'selected' : '' }}>
                                                                    Lunas
                                                                </option>
                                                                <option value="Batal"
                                                                    {{ $data->status_peminjaman == 'Batal' ? 'selected' : '' }}>
                                                                    Batal
                                                                </option>
                                                            </select>
                                                        </div>
                                                        {{-- @if ($data->status_peminjaman == 'Batal') --}}
                                                        <div class="form-group batal">
                                                            <label for="Pembatalan dilakukan oleh">Pembatalan dilakukan
                                                                oleh</label>
                                                            <input type="text" class="form-control" name="keterangan"
                                                                placeholder="Sertakan alasan pembatalan">
                                                        </div>
                                                        {{-- @endif --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal --}}
                                @endforeach
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
                                '<td>' + (val.nilai == 1 ? 'Buruk' : (val.nilai == 2 ?
                                    'Cukup' : 'Baik')) + '</td>'
                            '</tr>'

                            $('#table-detail tbody').append(tr_list)
                        })
                    },
                    error: function(err) {
                        console.log('Error', err)
                    }
                })
            })

            $('.batal').hide()
            $('.status_peminjaman').change(function() {
                let status_peminjaman = $(this).val()

                if (status_peminjaman == 'Batal') {
                    $('.batal').show()
                } else {
                    $('.batal').hide()
                }
            })
        })

    </script>
@endsection
