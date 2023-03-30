@extends('template.layout')
@section('title', 'Review Lamaran Kerja')

@section('content')
<div class="mx-32 my-10 rounded-xl shadow-xl p-10 bg-slate-50">
    <h2 class="title-page">Review Lamaran Kerja</h2>
    <p class="paragraph-text text-center my-3">Silahkan review dahulu sebelum submit data diri anda</p>
    <div class="grid grid-cols-2 gap-5 text-gray-800 my-10">
        <div class="flex flex-col">
            <label class="text-xl font-bold">Nama:</label>
            <label class="text-lg font-semibold">{{$data['nama']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Posisi yang dilamar:</label>
            <label class="text-lg font-semibold">{{$data['posisi']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">No HP/Whatsapp:</label>
            <label class="text-lg font-semibold">{{$data['no_hp']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Email:</label>
            <label class="text-lg font-semibold">{{$data['email']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Tempat, tanggal lahir:</label>
            <label class="text-lg font-semibold">{{$data['ttl']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Alamat sesuai KTP:</label>
            <label class="text-lg font-semibold">{{$data['alamat_ktp']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Alamat Domisili:</label>
            <label class="text-lg font-semibold">{{$data['alamat_domisili']}}</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Berkas Lamaran:</label>
            <label class="text-lg font-semibold">file.pdf</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Sertifikat dan Dokumen pendukung:</label>
            <label class="text-lg font-semibold">file.pdf</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">Scan KTP:</label>
            <label class="text-lg font-semibold">file.pdf</label>
        </div>
        <div class="flex flex-col">
            <label class="text-xl font-bold">STR:</label>
            <label class="text-lg font-semibold">file.pdf</label>
        </div>
    </div>
    <div class="flex gap-3">
        <button class="btn-primary">Submit</button>
        <button class="btn-primary">Ubah</button>
    </div>
</div>
@endsection