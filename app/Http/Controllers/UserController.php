<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Loker;
use App\Models\Pelamar;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data = Loker::select('id', 'nama_pekerjaan', 'deadline', 'min_pendidikan')->where('active', 1)->get();
        return view('carrer', ['data' => $data]);
    }

    public function detail(Request $request, string $id)
    {
        $data = Loker::where('id', $id)->get()->first();

        $umum = explode("#", $data->persyaratan_umum);
        $berkas = explode("#", $data->persyaratan_berkas);

        if ($data->active == 0) {
            return redirect('/home');
        }

        $detail = [
            "id_pekerjaan" => $data->id,
            "nama_pekerjaan" => $data->nama_pekerjaan,
            "penutupan" => $data->deadline,
            "list_umum" => $umum,
            "list_berkas" => $berkas
        ];

        return view('detail', ['detail' => $detail]);
    }

    public function submit_page(Request $request, string $id)
    {
        $job = Loker::where('id', $id)->first();
        $position = $job->nama_pekerjaan;
        $id_pekerjaan = $job->id;
        if ($job->active == 0) {
            return redirect('/home');
        }
        return view('submit', ["id" => $id_pekerjaan, "posisi" => $position, "id_posisi" => $id]);
    }

    public function review_submit(Request $request)
    {
        $data = [
            "nama" => $request->input('in_nama'),
            "posisi" => $request->input('id_posisi'),
            "no_hp" => $request->input('in_nohp'),
            "email" => $request->input('in_email'),
            "ttl" => $request->input('in_tempat') . ", " . $request->input('in_tgl'),
            "alamat_ktp" => $request->input('in_alamatktp'),
            "alamat_domisili" => $request->input('in_domisili'),
        ];
        return view('review_lamaran', ["data" => $data]);
    }

    public function send_mail(Request $request)
    {
        $this->validate($request, [
            'upload_dokumen'    => 'required|mimes:pdf|max:2048',
            'upload_ktp'        => 'required|mimes:pdf,jpg,jpeg|max:1024',
            'upload_sertifikat' => 'mimes:pdf|max:2048',
            'upload_str'        => 'mimes:pdf|max:1024'
        ]);

        $posisi     = $request->input('posisi');
        $id_posisi  = $request->input('id_posisi');
        $nama       = $request->input('in_nama');
        $no_hp      = $request->input('in_nohp');
        $email      = $request->input('in_email');
        $ttl        = $request->input('in_tempat') . ", " . $request->input('in_tgl');
        $alamat_ktp = $request->input('in_alamatktp');
        $alamat_domisili = $request->input('in_domisili');

        $data_file_upload = ['dokumen', 'ktp', 'sertifikat', 'str'];
        $file = [];
        $file_attachment = [];

        for ($i=0; $i < count($data_file_upload); $i++) {
            if($request->file('upload_'.$data_file_upload[$i]) != null){
                $file[] = $request->file('upload_'.$data_file_upload[$i]);
                $file_attachment[] = $nama . '_'.$data_file_upload[$i].'_' . time() . '_' . $file[$i]->getClientOriginalName();
            }
        }

        $valid = Pelamar::where([
            ['nama_pelamar', '=', $nama],
            ['posisi', '=', $id_posisi]
        ])->first();

        $valid_mail = Pelamar::where([
            ['posisi', '=', $id_posisi],
            ['email', '=', $email]
        ])->first();

        if ($valid == null && $valid_mail == null) {
            for ($h=0; $h < count($file); $h++) { 
                $file[$h]->storeAs('public', $file_attachment[$h]);
            }
            
            $subject = 'lamaran kerja posisi ' . $posisi . ' - ' . $nama;
            
            $detail = [
                'nama' => $nama,
                'posisi' => $posisi,
                'no_hp' => $no_hp,
                'email' => $email,
                'ttl' => $ttl,
                'alamat_ktp' => $alamat_ktp,
                'alamat_domisili' => $alamat_domisili
            ];
            
            try {
                Mail::to("it.wavakesamben@gmail.com")->send(new SendMail($detail, $subject, $file_attachment));
                session()->flash('message', 'success');
                for ($j=0; $j < count($file_attachment); $j++) { 
                    Storage::delete('public/' . $file_attachment[$j]);
                }
                Pelamar::create([
                    'nama_pelamar'      => $nama,
                    'posisi'            => $id_posisi,
                    'no_hp'             => $no_hp,
                    'email'             => $email,
                    'ttl'               => $ttl,
                    'alamat_ktp'        => $alamat_ktp,
                    'alamat_domisili'   => $alamat_domisili
                ]);
                return view('submited');
            } catch (\Throwable $th) {
                session()->flash('message', 'failed');
                return view('submited');
            }
        } else {
            session()->flash('message', 'invalid');
            return view('submited');
        }
    }

    public function uploadFile(Request $request)
    {
        $file_document = $request->file('upload_dokumen');
        $file_sertifikat = $request->file('upload_sertifikat');
        $file_ktp = $request->file('upload_ktp');
        $file_str = $request->file('upload_str');

        $this->validate($request, [
            'upload_dokumen'    => 'required|mimes:pdf|max:3072',
            'upload_sertifikat' => 'required|mimes:pdf|max:3072',
            'upload_ktp'        => 'required|mimes:pdf,jpg,jpeg|max:2048',
            'upload_str'        => 'required|mimes:pdf|max:2048'
        ]);


        try {
            $filename_document      = time() . '_1_' . $file_document->getClientOriginalName();
            $filename_sertifikat    = time() . '_2_' . $file_sertifikat->getClientOriginalName();
            $filename_ktp           = time() . '_3_' . $file_ktp->getClientOriginalName();
            $filename_str           = time() . '_4_' . $file_str->getClientOriginalName();

            $file_document->storeAs('public/document', $filename_document);
            $file_sertifikat->storeAs('public/document', $filename_sertifikat);
            $file_ktp->storeAs('public/document', $filename_ktp);
            $file_str->storeAs('public/document', $filename_str);

            dd("success upload file");
        } catch (\Throwable $th) {
            dd("failed upload file");
        }
    }
}
