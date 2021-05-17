@extends('layouts.app')

@section('title')
    Perhitungan
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Perhitungan
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Perhitungan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Nilai -->
                <div class="box">
                    <div class="box-header">
                        <h3>Nilai</h3>
                    </div>
                    <div class="box-body">
                        <table id="hasil" class="table table-bordered table-hover table-responsive dataTable" role="grid"
                            aria-describedby="hasil_info">
                            <thead>
                                <th rowspan="2" class="text-center">Nasabah</th>
                                <?php $bobot = []; ?>
                                @foreach ($kriteria as $krit)
                                    <?php $bobot[$krit->id] = $krit->bobot; ?>
                                    <th class="text-center">{{ $krit->kode }} [{{ $krit->bobot }}]</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @if (!empty($nasabah))
                                    @foreach ($nasabah as $nsb)
                                        <tr>
                                            <td>
                                                {{ $nsb->nama }}
                                            </td>
                                            @foreach ($nsb->nilai as $nilai)
                                                <td>{{ $nilai->nilai }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{ count($kriteria) + 1 }}" class="text-center">Data tidak
                                            ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <!-- Normalisasi -->
                <div class="box">
                    <div class="box-header">
                        <h3>Normalisasi</h3>
                    </div>
                    <div class="box-body">
                        <table id="normalisasi" class="table table-bordered table-hover table-responsive dataTable">
                            <thead>
                                <th rowspan="2" class="text-center">Nasabah</th>
                                <?php $bobot = []; ?>
                                @foreach ($kriteria as $krit)
                                    <?php $bobot[$krit->id] = $krit->bobot; ?>
                                    <th class="text-center">{{ $krit->kode }} [{{ $krit->bobot }}]</th>
                                @endforeach
                            </thead>
                            <tbody>
                                @if (!empty($nasabah))
                                    <?php $ranking = []; ?>
                                    @foreach ($nasabah as $data)
                                        <tr>
                                            <td>[{{ $data->noKtp }}] - {{ $data->nama }}</td>
                                            <?php $total = 0; ?>
                                            @foreach ($data->nilai as $value)
                                                @if ($value->kriteria->jenis == 'Cost')
                                                    <?php $normalisasi =
                                                    number_format($kode_krit[$value->kriteria->id] / $value->nilai, 2); ?>
                                                @elseif($value->kriteria->jenis == 'Benefit')
                                                    <?php $normalisasi = number_format($value->nilai /
                                                    $kode_krit[$value->kriteria->id], 2); ?>
                                                @endif
                                                <?php $total = number_format($total +
                                                $bobot[$value->kriteria->id] * $normalisasi, 2); ?>
                                                <td>{{ $normalisasi }}
                                                </td>
                                            @endforeach
                                            <?php $ranking[] = [
                                            'noKtp' => $data->noKtp,
                                            'nama' => $data->nama,
                                            'total' => $total,
                                            ]; ?>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="{{ count($kriteria) + 1 }}" class="text-center">Data tidak
                                            ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <!-- Ranking -->
                <div class="box">
                    <div class="box-header">
                        <h3>Ranking</h3>
                    </div>
                    <div class="box-body">
                        <table id="ranking" class="table table-bordered table-hover table-responsive dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">Nasabah</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status Pengajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // var_dump($ranking);
                                usort($ranking, function ($a, $b) {
                                return strcmp($a['total'], $b['total']);
                                // return $a['total'] <=> $b['total'];
                                    });
                                    $ranking = array_reverse($ranking);
                                    // print_r($ranking[0]);
                                    // rsort($ranking);
                                    // asort($ranking);
                                    // array_revers
                                    $a = 1;
                                    ?>
                                    @foreach ($ranking as $t)
                                        <tr>
                                            <td>[{{ $t['noKtp'] }}] - {{ $t['nama'] }}</td>
                                            <td>{{ $t['total'] }}</td>
                                            <td>{{ $a++ }}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
