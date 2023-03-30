@extends('template.layout')

@section('title', 'Detail Lowongan kerja')

@section('content')
    <h2 class="title-page">Lowongan pekerjaan</h2>
    <h2 class="title-page mt-5 mb-10">{{ $detail['nama_pekerjaan'] }}</h2>
    <div class="mx-32">
        <h2 class="text-3xl font-semibold">Posisi: {{ $detail['nama_pekerjaan'] }}</h2>
        <div class="flex gap-2 items-center mt-2">
            <button class="flex gap-2 items-center bg-secondary py-1 px-3 rounded-full">
                <i class="fa fa-circle text-green-700"></i><span class="font-semibold">Buka</span>
            </button>
            <label class="font-semibold text-gray-800">sampai {{date('d F Y', strtotime($detail['penutupan']))}}</label>
        </div>
    </div>
    <div class="mb-5 mx-20 grid grid-cols-2">
        <div class="card">
            <div class="flex gap-2 items-center">
                <i class="fa fa-user"></i>
                <h2 class="card-title">Persyaratan Umum</h2>
            </div>
            <hr class="my-3" />
            <ul class="list">
                @for ($i = 0; $i < count($detail['list_umum'])-1; $i++)
                    <li class="item-list">- {{ $detail['list_umum'][$i] }}</li>
                @endfor
            </ul>
        </div>
        <div class="card">
            <div class="flex gap-2 items-center">
                <i class="fa fa-file"></i>
                <h2 class="card-title">Persyaratan Berkas</h2>
            </div>
            <hr class="my-3" />
            <ul class="list">
                @for ($i = 0; $i < count($detail['list_berkas'])-1; $i++)
                    <li class="item-list">- {{ $detail['list_berkas'][$i] }}</li>
                @endfor
            </ul>
        </div>
    </div>
    <div class="flex justify-between my-5 mx-32">
        <div class="flex gap-2 items-center">
            <span class="font-semibold text-gray-800 text-xl">Lamar pekerjaan ini melalui link berikut--></span>
            <a href="/submit/{{ $detail['id_pekerjaan'] }}"><button class="btn-primary flex gap-2 items-center"><i
                        class="fa fa-file"></i><span>Gabung sekarang</span></button></a>
        </div>
        <a href="/" class="text-gray-800 font-semibold text-xl">
            <-- Kembali</a>
    </div>
@endsection
