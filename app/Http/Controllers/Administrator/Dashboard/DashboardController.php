<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Models\Arsip;
use App\Models\DataBarang;
use App\Models\DataDonasi;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donasi;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data yang ada
        $totalDistribusi = Distribusi::count();
        $totalArsip = Arsip::count();
        $totalDonatur = User::count();

        // Mengambil peran "guest"
        $guestRole = Role::where('name', 'guest')->first();

        // Menghitung jumlah pengguna dengan peran "guest"
        $totalGuest = 0;
        if ($guestRole) {
            $totalGuest = User::whereHas('roles', function ($query) use ($guestRole) {
                $query->where('role_id', $guestRole->id);
            })->count();
        }

        $totalBarang = DataBarang::count();

        // Menghitung total donasi sesuai dengan pengguna yang login
        $user = auth()->user();
        $totalDonasi = 0;
        if ($user) {
            $totalDonasi = Donasi::where('user_id', $user->id)->count();
        }

        return view('administrator.dashboard', compact('totalDistribusi', 'totalDonatur', 'totalArsip', 'totalBarang', 'totalGuest', 'totalDonasi'));
    }
}
