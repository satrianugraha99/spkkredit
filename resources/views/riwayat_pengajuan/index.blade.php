@extends('layouts.app')

@section('title')
    Riwayat Pengajuan
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Riwayat Pengajuan
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="/nasabah">Nasabah</a></li>
            <li class="active">Riwayat Pengajuan</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('nsukses'))
            <div class="alert alert-success" role="nasabah-success">
                {{ session('nsukses') }}
            </div>
        @endif
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <table class="table table-bordered table-hover" id="riwayat">
                    <thead>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pengajuan Ke</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Validasi</th>
                        <th>Status Pengajuan</th>
                        <th>Status Peminjaman</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $key => $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nasabah->nama }}</td>
                                <td>Pengajuan Ke - {{ $key + 1 }}</td>
                                <td>{{ konversi_tanggal($p->tanggal_pengajuan) }}</td>
                                <td>{{ $p->tanggal_validasi == null ? 'Belum divalidasi' : konversi_tanggal($p->tanggal_validasi) }}
                                </td>
                                <td>{{ $p->status_pengajuan }}</td>
                                <td>{{ $p->status_peminjaman }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-success btn-detail" data-toggle="modal"
                                        data-id="{{ $p->id }}">
                                        <i class="fa fa-eye"> Detail</i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="detail" tabindex="-1" role="dialog"
                                        aria-labelledby="detailLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="detailLabel">Detail Data Pengajuan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-stripped" id="table-detail">
                                                        <thead>
                                                            <th>No</th>
                                                            <th>Data Pengajuan</th>
                                                            <th>Keterangan Nilai</th>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                    {{-- @foreach ($pengajuan as $data) --}}
                                                    Status Pengajuan Kredit : <strong> {{ $p->status_pengajuan }}
                                                    </strong>
                                                    {{-- @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            function currencyFormatDE(num) {
                return (
                    num
                    .toFixed(0) // always two decimal digits
                    .replace('.', ',') // replace decimal point character with ,
                    .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                ) // use . as a separator
            }
            $('#riwayat').DataTable()

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
                                '<td id=rupiah' + (key + 1) + ' >' + (
                                    val.ket_nilai) +
                                '</td>'
                            '</tr>'

                            $('#table-detail tbody').append(tr_list)
                        })
                        let pendapatan = parseInt($('#rupiah1').text())
                        $('#rupiah1').text('Rp. ' + currencyFormatDE(pendapatan))
                        let plapon = parseInt($('#rupiah4').text())
                        $('#rupiah4').text('Rp. ' + currencyFormatDE(plapon))
                        // $('#rupiah1').addClass('text-right')
                    },
                    error: function(err) {
                        console.log('Error', err)
                    }
                })
            })
        });

    </script>
@endsection
