<?php

namespace App\Http\Controllers;

use App\Models\Sale;

class DashboardController extends Controller
{
public function index()
{
    $salesData = Sale::selectRaw('SUM(amount) as total, MONTH(sale_date) as month_num')
        ->groupBy('month_num')
        ->orderBy('month_num')
        ->get();

    $labels = $salesData->map(function ($item) {
        return date('F', mktime(0, 0, 0, $item->month_num, 1));
    });

    $data = $salesData->pluck('total');

    return view('dashboard', compact('labels', 'data'));
}
}