<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Models\Arsip;
use App\Models\DataBarang;
use App\Models\DataDonasi;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDistribusi = Distribusi::count();
        $totalDonatur = DataDonasi::count();
        $totalArsip = Arsip::count();
        $totalBarang = DataBarang::count();
        return view('administrator.dashboard', compact('totalDistribusi','totalDonatur','totalArsip','totalBarang'));
    }
}
