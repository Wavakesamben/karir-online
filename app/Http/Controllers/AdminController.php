<?php

namespace App\Http\Controllers;

use App\Models\Loker;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        session(['page' => 'dashboard']);
        $loker = Loker::count();
        $open = Loker::where('active', 1)->count();
        $closed = Loker::where('active', 0)->count();
        $pelamar = Pelamar::count();

        return view('admin.dashboard', [
            'loker' => $loker, 
            'open' => $open,
            'closed' => $closed,
            'pelamar' => $pelamar
        ]);
    }
}
