@extends('template.layout')
@section('title', 'Submit Lamaran Pekerjaan')

@section('content')
    <div class="mx-32 my-10 rounded-xl shadow-xl p-10 bg-slate-50">
        <h2 class="title-page">Submit Lamaran Kerja</h2>
        <p class="paragraph-text text-center my-3">Silahkan isi data diri anda untuk melamar pekerjaan</p>
        <form action="/sending_lamaran" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <label for="in_nama">Nama Lengkap*</label>
                <input type="text" id="in_nama" name="in_nama" placeholder="Masukan nama lengkap..">
            </div>

            <div class="input-group">
                <label for="in_posisi">Posisi yang Dilamar</label>
                <input type="text" id="in_nama" name="in_posisi" value="{{ $posisi }}" disabled>
                <input type="hidden" name="posisi" value="{{ $posisi }}">
                <input type="hidden" name="id_posisi" value="{{ $id_posisi }}">
            </div>

            <div class="input-group">
                <label for="in_nohp">No. HP/Whatsapp* (contoh: 085856918678)</label>
                <input type="text" id="in_nohp" name="in_nohp" placeholder="Masukan No HP..">
            </div>

            <div class="input-group">
                <label for="in_email">Alamat Email*</label>
                <input type="email" id="in_email" name="in_email" placeholder="Masukan nama lengkap..">
            </div>

            <div class="input-group">
                <label for="in_tempat">Tempat Tanggal Lahir*</label>
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" id="in_tempat" name="in_tempat" placeholder="Masukan tempat lahir..">
                    <input type="date" id="in_tgl" name="in_tgl">
                </div>
            </div>

            <div class="input-group">
                <label for="in_alamatktp">Alamat Sesuai KTP*</label>
                <input type="text" id="in_alamatktp" name="in_alamatktp" placeholder="Masukan alamat sesuai KTP.."
                    >
            </div>

            <div class="input-group">
                <label for="in_domisili">Alamat Domisili* (contoh: Jl. Jugo No.1 Desa Kesamben Kec. Kesamben Kab. Blitar Kode
                    Pos 66192)</label>
                <input type="text" id="in_domisili" name="in_domisili" placeholder="Masukan alamat domisili sekarang.."
                    >
            </div>

            <div class="input-group">
                <label>Upload Berkas* (Surat Lamaran Kerja, CV, Scan Ijazah Terakhir, Scan Surat SKCK)</label>
                <input type="file" name="upload_dokumen" accept="application/pdf">
                <span class="text-xs font-semibold mt-2">Format file PDF Maksimal ukuran 3MB</span>
            </div>

            <div class="input-group">
                <label>Upload Scan KTP*</label>
                <input type="file" name="upload_ktp" accept="application/pdf">
                <span class="text-xs font-semibold mt-2">Format file PDF/JPG/JPEG Maksimal ukuran 1MB</span>
            </div>

            <div class="input-group">
                <label>Upload Sertifikat dan dokumen pendukung</label>
                <input type="file" name="upload_sertifikat" accept="application/pdf">
                <span class="text-xs font-semibold mt-2">Format file PDF Maksimal ukuran 3MB</span>
            </div>

            <div class="input-group">
                <label>Upload STR (Untuk pekerjaan Nakes)</label>
                <input type="file" name="upload_str" accept="application/pdf">
                <span class="text-xs font-semibold mt-2">Format file PDF Maksimal ukuran 3MB</span>
            </div>

            <span class="text-small font-semibold text-gray-800"><strong class="text-gray-800">Catatan:</strong> tanda * wajib diisi</span>

            <div class="flex items-center mt-3 mb-5">
                <input id="acc-check" type="checkbox" value="" onclick="agree()"
                    class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2">
                <label for="acc-check" class="ml-2 text-sm font-medium text-gray-800 ">Data yang saya masukan sudah benar dan saya sudah memeriksanya kembali</label>
            </div>

            <button type="submit" class="btn-primary" id="btn_submit" disabled>Submit -></button>

        </form>
    </div>
    <script>
        const check = document.getElementById("acc-check");
        const btn_submit = document.getElementById("btn_submit");

        function agree(){
            if(check.checked == true){
                btn_submit.disabled = false;
            }else{
                btn_submit.disabled = true;
            }
        }
        
    </script>
@endsection
