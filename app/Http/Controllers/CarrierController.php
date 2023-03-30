<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loker;

class CarrierController extends Controller
{
    public function index(){
            session(['page' => 'loker']);
            $data_loker = Loker::all();
            // $date = date('Y-m-d');
            // $data = Loker::whereBetween('created_at', [$date.' 00:00:00', $date.' 23:59:59'])->get();   #filter 
            // dd($data);
            return view('admin.list_carrer', ['data_loker' => $data_loker]);
    }

    public function add(Request $request){
        $nama           = $request->input("in_namacarrier");
        $deadline       = $request->input("in_deadline");
        $minimal_pend   = $request->input("in_minpend");
        $umum           = $request->input("res_umum");
        $berkas         = $request->input("res_berkas");
        $publish        = $request->input("publish");

        $slug = str_replace(' ', '_', $nama);

        try {
            Loker::create([
                "nama_pekerjaan" => $nama,
                "slug" => $slug,
                "deadline" => $deadline,
                "min_pendidikan" => $minimal_pend,
                "persyaratan_umum" => $umum,
                "persyaratan_berkas" => $berkas,
                "active" => $publish
            ]);
            return redirect('/carrier_4Dm1N_P4n3L/carrier');
        } catch (\Throwable $th) {
            return view('admin.add_carrer');
        }
    }

    public function delete(Request $request, string $id){
        try {
            Loker::where('id', $id)->delete();
            return redirect('/carrier_4Dm1N_P4n3L/carrier');
        } catch (\Throwable $th) {
            return redirect('/carrier_4Dm1N_P4n3L/carrier');
        }
    }

    public function update(Request $request, string $id){
        
    }

    public function publish(Request $request, string $id){
        $active = Loker::select('id','active')->where('id', $id)->get()->first();
        $id_loker = $active->id;
        $state = $active->active;

        try {
            if($state == 1){
                Loker::where('id', $id_loker)->update(["active" => 0]);
            }else{
                Loker::where('id', $id_loker)->update(["active" => 1]);
            }

            return redirect('/carrier_4Dm1N_P4n3L/carrier');
        } catch (\Throwable $th) {
            return redirect('/carrier_4Dm1N_P4n3L/carrier');
        }
    }

}
