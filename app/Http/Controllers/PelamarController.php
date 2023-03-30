<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
            session(['page' => 'pelamar']);
            $data = Pelamar::select('pelamar.id', 'nama_pelamar', 'nama_pekerjaan', 'email', 'no_hp')
                    ->join('loker', 'pelamar.posisi', '=', 'loker.id')
                    ->get();
            return view('admin.list_pelamar', ['data' => $data]);
        
    }

    public function delete(Request $request, string $id){
        try {
            Pelamar::where('id', $id)->delete();
            return redirect('/carrier_4Dm1N_P4n3L/pelamar');
        } catch (\Throwable $th) {
            return redirect('/carrier_4Dm1N_P4n3L/pelamar');
        }
    }
}
