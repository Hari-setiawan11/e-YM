<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Models\Arsip;
use App\Models\DataBarang;
use App\Models\DataDonasi;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDistribusi = Distribusi::count();
        $totalUser = User::count()-2;
        $totalArsip = Arsip::count();
        $totalBarang = DataBarang::count();
        $donationData = [5000, 10000, 15000, 20000, 25000, 30000, 35000, 40000, 45000, 50000, 55000, 60000];
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return view('administrator.dashboard', compact('totalDistribusi','totalUser','totalArsip','totalBarang','donationData','months'));
    }
}