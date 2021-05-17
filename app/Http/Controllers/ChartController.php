<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chart_pendapatan()
    {

        return response()->json([
            'data' => view('dashboard.chart.pendapatan')->render(),
        ]);

        // $msg = [
        //     'data' => view('dashboard.chart.pendapatan')
        // ];

        // echo json_encode($msg);
    }
}
