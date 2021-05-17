<div id="barChart2"></div>
<script>
    Highcharts.chart('barChart2', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Laporan Data Pengajuan Plapon Kredit'
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
        // legend: {
        //     layout: 'vertical',
        //     align: 'right',
        //     verticalAlign: 'top',
        //     x: -40,
        //     y: 80,
        //     floating: true,
        //     borderWidth: 1,
        //     backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        //     shadow: true
        // },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Jumlah',
            // data: [{!! json_encode('nilai->3') !!}, {!! json_encode('nilai->2') !!}, {!! json_encode('nilai->1') !!}]
            data: [4, 2, 2]
        }]
    });

</script>
