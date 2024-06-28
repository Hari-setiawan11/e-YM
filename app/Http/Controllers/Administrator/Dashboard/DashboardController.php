<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Models\Arsip;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donasi;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data yang ada
        $totalDistribusi = Distribusi::count();
        $totalArsip = Arsip::count();
        $totalDonatur = User::count();
        $totalDonasi = Donasi::count();
        $totalProgram = Program::count();

        // Mengambil peran "guest"
        $guestRole = Role::where('name', 'guest')->first();

        // Menghitung jumlah pengguna dengan peran "guest"
        $totalGuest = 0;
        if ($guestRole) {
            $totalGuest = User::whereHas('roles', function ($query) use ($guestRole) {
                $query->where('role_id', $guestRole->id);
            })->count();
        }

        $user = auth()->user();
        $donasiPerBulan = collect();

        $totalDonasiPerBulan = Donasi::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(nominal) as total')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

    // Menghitung total donasi keseluruhan admin
        $totalDonasiAdmin = Donasi::sum('nominal');
        $totalDonasiAdminFormatted = number_format($totalDonasiAdmin, 0, ',', '.');

        if ($user) {
            // Menghitung total donasi per bulan untuk user yang login
            $donasiPerBulan = Donasi::where('user_id', $user->id)
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(nominal) as total')
                ->groupBy('year', 'month')
                ->orderBy('year', 'asc')
                ->orderBy('month', 'asc')
                ->get()
                ->keyBy(function ($item) {
                    return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
                });

            // Menghitung total donasi keseluruhan untuk user yang login
            $totalDonasi = Donasi::where('user_id', $user->id)->sum('nominal');
        }

        // Format total donasi ke format rupiah
        $totalDonasiFormatted = number_format($totalDonasi, 0, ',', '.');

        // Nama bulan dalam bahasa Indonesia
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Menyusun data untuk setiap bulan dalam setahun
        $currentYear = Carbon::now()->year;
        $donationData = [];
        foreach (range(1, 12) as $month) {
            $key = $currentYear . '-' . str_pad($month, 2, '0', STR_PAD_LEFT);
            $donationData[] = isset($donasiPerBulan[$key]) ? $donasiPerBulan[$key]->total : 0;
        }

        return view('administrator.dashboard', compact('totalDistribusi', 'totalDonatur', 'totalArsip', 'totalProgram', 'totalGuest', 'totalDonasiFormatted', 'donationData', 'months','totalDonasiAdmin','totalDonasiAdminFormatted'));
    }
 }