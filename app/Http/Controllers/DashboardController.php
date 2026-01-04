<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Balita;
use App\Models\User;
use App\Models\Penimbangan;
use App\Models\Imunisasi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('dashboard.admin', [
                'total_balita' => Balita::count(),
                'total_penimbangan' => Penimbangan::count(),
                'total_imunisasi' => Imunisasi::count(),
                'total_users' => User::count(),
            ]);
        }

        // Untuk Pengguna (Non-Admin)
        // Menampilkan data ringkas atau redirect ke data balita
        return view('dashboard.pengguna', [
            'recent_penimbangans' => Penimbangan::with('balita')->latest()->take(5)->get(),
            'upcoming_imunisasis' => Imunisasi::with('balita')->where('tgl_imunisasi', '>=', now())->take(5)->get(),
        ]);
    }
}
