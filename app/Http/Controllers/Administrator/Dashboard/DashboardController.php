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


        // Menghitung total donasi sesuai dengan pengguna yang login
        $user = auth()->user();
        $totalDonasi = 0;
        if ($user) {
            $totalDonasi = Donasi::where('user_id', $user->id)->count();
        }

        // Ambil semua data donasi
        $donations = Donasi::all();

        // Inisialisasi array untuk menampung data donasi per bulan
        $donationData = array_fill(0, 12, 0);
        $months = [];

        // Iterasi melalui setiap donasi untuk mengelompokkan berdasarkan bulan
        foreach ($donations as $donation) {
            $month = Carbon::parse($donation->created_at)->month - 1;
            $donationData[$month] += $donation->nominal; // Menggunakan kolom 'nominal' di tabel donasi
        }

        // Nama bulan dalam bahasa Indonesia
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return view('administrator.dashboard', compact('totalDistribusi', 'totalDonatur', 'totalArsip', 'totalProgram', 'totalGuest', 'totalDonasi','donationData','months'));
    }
}
