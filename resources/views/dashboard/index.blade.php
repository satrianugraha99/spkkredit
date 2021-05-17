@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'kepalalpd')
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{ totalPengajuan() }}</h3>
                            <p>Pengajuan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <a href="/nasabah/status_pengajuan" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            <!-- ./col -->
            @if (auth()->user()->role == 'kepalalpd')
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ totalDiterima() }}</h3>
                            <p>Diterima</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check-square"></i>
                        </div>
                        <a href="/nasabah/status_pengajuan" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ totalDitolak() }}</h3>
                            <p>Ditolak</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-window-close"></i>
                        </div>
                        <a href="/nasabah/status_pengajuan" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            <!-- ./col -->
            @if (auth()->user()->role == 'admin')
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ totalNasabah() }}</h3>
                            <p>Data Nasabah</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                        </div>
                        <a href="/nasabah/data_nasabah" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            <!-- ./col -->
            @if (auth()->user()->role == 'admin')
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ totalKriteria() }}</h3>
                            <p>Kriteria</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <a href="/kriteria" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endif
            <!-- ./col -->
        </div>
        <!-- /.row -->
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'nasabah')
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h3>Sistem Pendukung Keputusan Pemberian Kredit<br>Pada LPD Desa Adat Intaran</h3>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                </div>
                <!-- /.box-body -->
            </div>
        @endif
        <!-- /.box -->
        @if (auth()->user()->role == 'kepalalpd')

            <div class="box">
                <div class="box-header with-border">
                    <div class="box-body">
                        <div class="chart">
                            <div id="pieChart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box">
                <div class="box-header with-border">
                    <div class="box-body">
                        <div class="text-center kriteria">
                            <button type="button" class="btn-pendapatan">Pendapatan Per Bulan</button>
                            <button type="button" class="btn-usia">Usia</button>
                            <button type="button" class="btn-pekerjaan">Pekerjaan</button>
                            <button type="button" class="btn-plapon">Plapon Kredit</button>
                            <button type="button" class="btn-penggunaan">Jenis Penggunaan</button>
                            <button type="button" class="btn-jangka_waktu">Jangka Waktu</button>
                            <button type="button" class="btn-jaminan">Jaminan</button>
                        </div>
                        <div class="chart2">
                            <div id="barChart1"></div>
                            <div id="barChart2"></div>
                            <div id="barChart3"></div>
                            <div id="barChart4"></div>
                            <div id="barChart5"></div>
                            <div id="barChart6"></div>
                            <div id="barChart7"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif




    </section>
    <!-- /.content -->
@endsection

@section('chart')
    <script src="/highcharts/highcharts.js"></script>
    {{-- <script src="/highcharts/modules/exporting.js"></script>
    <script src="/highcharts/modules/export-data.js"></script>
    <script src="/highcharts/modules/accessibility.js"></script> --}}
    <script>
        // Build the chart
        Highcharts.chart('pieChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Laporan Status Pengajuan Kredit'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran</a>'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f} %</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true
                    },
                    showInLegend: false
                }
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: [{
                    name: 'Diterima',
                    y: {{ status_diterima_count() }}
                }, {
                    name: 'Ditolak',
                    y: {{ status_ditolak_count() }}
                }]
            }]
        });

    </script>
@endsection

@section('js')
    <script>
        $('#barChart1').show()
        $('#barChart2').hide()
        $('#barChart3').hide()
        $('#barChart4').hide()
        $('#barChart5').hide()
        $('#barChart6').hide()
        $('#barChart7').hide()

        // pendapatan
        $(document).ready(function() {
            $('body').on('click', '.btn-pendapatan', function() {
                $('#barChart1').show()
                $('#barChart2').hide()
                $('#barChart3').hide()
                $('#barChart4').hide()
                $('#barChart5').hide()
                $('#barChart6').hide()
                $('#barChart7').hide()
            })
        });

        // usia
        $(document).ready(function() {
            $('body').on('click', '.btn-usia', function() {
                $('#barChart1').hide()
                $('#barChart2').show()
                $('#barChart3').hide()
                $('#barChart4').hide()
                $('#barChart5').hide()
                $('#barChart6').hide()
                $('#barChart7').hide()
            })
        });

        // pekerjaan
        $(document).ready(function() {
            $('body').on('click', '.btn-pekerjaan', function() {
                $('#barChart1').hide()
                $('#barChart2').hide()
                $('#barChart3').show()
                $('#barChart4').hide()
                $('#barChart5').hide()
                $('#barChart6').hide()
                $('#barChart7').hide()
            })
        });

        //plapon
        $(document).ready(function() {
            $('body').on('click', '.btn-plapon', function() {
                $('#barChart1').hide()
                $('#barChart2').hide()
                $('#barChart3').hide()
                $('#barChart4').show()
                $('#barChart5').hide()
                $('#barChart6').hide()
                $('#barChart7').hide()
            })
        });

        //penggunaan
        $(document).ready(function() {
            $('body').on('click', '.btn-penggunaan', function() {
                $('#barChart1').hide()
                $('#barChart2').hide()
                $('#barChart3').hide()
                $('#barChart4').hide()
                $('#barChart5').show()
                $('#barChart6').hide()
                $('#barChart7').hide()
            })
        });

        //jangka_waktu
        $(document).ready(function() {
            $('body').on('click', '.btn-jangka_waktu', function() {
                $('#barChart1').hide()
                $('#barChart2').hide()
                $('#barChart3').hide()
                $('#barChart4').hide()
                $('#barChart5').hide()
                $('#barChart6').show()
                $('#barChart7').hide()
            })
        });

        //jaminan
        $(document).ready(function() {
            $('body').on('click', '.btn-jaminan', function() {
                $('#barChart1').hide()
                $('#barChart2').hide()
                $('#barChart3').hide()
                $('#barChart4').hide()
                $('#barChart5').hide()
                $('#barChart6').hide()
                $('#barChart7').show()
            })
        });

    </script>
@endsection

@section('chart2')
    <script src="/highcharts/highcharts.js"></script>
    {{-- 1 pendapatan --}}
    <script>
        Highcharts.chart('barChart1', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Pendapatan Per Bulan'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['> 3 Juta', '≥ 1 Juta - ≤ 3 Juta', '< 1 Juta'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ pendapatan_count(3) }},
                    {{ pendapatan_count(2) }},
                    {{ pendapatan_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end pendapatan --}}

    {{-- 2 usia --}}
    <script>
        Highcharts.chart('barChart2', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Usia'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['≥ 21 Tahun - ≤ 40 Tahun', '≥ 41 Tahun - ≤ 60 Tahun', '> 60 Tahun'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ usia_count(3) }},
                    {{ usia_count(2) }},
                    {{ usia_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end usia --}}

    {{-- 3 pekerjaan --}}
    <script>
        Highcharts.chart('barChart3', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Pekerjaan'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['PNS', 'Wiraswasta', 'Pekerja Tidak Tetap'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ pekerjaan_count(3) }},
                    {{ pekerjaan_count(2) }},
                    {{ pekerjaan_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end pekerjaan --}}

    {{-- 4 plapon --}}
    <script>
        Highcharts.chart('barChart4', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Plapon Kredit'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['< 1 Juta', '≥ 1 Juta - ≤ 3 Juta', '> 3 Juta'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ plapon_count(3) }},
                    {{ plapon_count(2) }},
                    {{ plapon_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end plapon --}}

    {{-- 5 penggunaan --}}
    <script>
        Highcharts.chart('barChart5', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Jenis Penggunaan'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['Modal Usaha', 'Investasi', 'Konsumtif'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ penggunaan_count(3) }},
                    {{ penggunaan_count(2) }},
                    {{ penggunaan_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end penggunaan --}}

    {{-- 6 jangka_waktu --}}
    <script>
        Highcharts.chart('barChart6', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Jangka Waktu'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['< 12 bulan', '≥ 12 bulan - ≤ 24 bulan', '≥ 24 bulan - ≤ 36 bulan'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ jangka_waktu_count(3) }},
                    {{ jangka_waktu_count(2) }},
                    {{ jangka_waktu_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end jangka_waktu --}}

    {{-- 7 jaminan --}}
    <script>
        Highcharts.chart('barChart7', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan Data Pengajuan<br>Jaminan'
            },
            subtitle: {
                text: 'LPD Desa Adat Intaran'
            },
            xAxis: {
                categories: ['Sertifikat Tanah', 'BPKB', 'Slip Gaji'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pengajuan (P)',
                    align: 'low'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' Pengajuan'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Jumlah',
                data: [
                    {{ jaminan_count(3) }},
                    {{ jaminan_count(2) }},
                    {{ jaminan_count(1) }}
                ]
            }]
        });

    </script>
    {{-- end jaminan --}}

@endsection
