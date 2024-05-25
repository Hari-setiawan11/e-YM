<?php

namespace App\Http\Controllers\Administrator\Dashboard;

use App\Models\User;
use App\Models\Arsip;
use App\Models\DataBarang;
use App\Models\Distribusi;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
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
    
        return view('administrator.dashboard', compact('totalDistribusi', 'totalDonatur', 'totalArsip', 'totalBarang', 'totalGuest'));
    }
}
