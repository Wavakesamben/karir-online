@extends('template.layout')

@section('title', 'Thanks for submited')

@section('content')
    <div class="h-screen">
        @if (session('message') == 'success')
            <h2 class="text-center font-bold my-10 text-2xl text-gray-800">
                Terima kasih sudah mengirim lamaran kerja di RS Wava Husada Kesamben
            </h2>
            <div class="flex justify-center">
                <img src="/img/CWS.png" class="w-1/4" alt="Logo care with smile">
            </div>
        @elseif (session('message') == 'failed')
            <h2 class="text-center font-bold my-10 text-2xl text-gray-800">
                Gagal mengirim lamaran, silahkan kirim beberapa saat lagi
            </h2>
            <div class="flex justify-center text-rose-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-1/6" viewBox="0 0 512 512">
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                </svg>
            </div>
        @elseif (session('message') == 'invalid')
            <h2 class="text-center font-bold my-10 text-2xl text-gray-800">
                Anda sudah mengirim lamaran di posisi ini
            </h2>
            <div class="flex justify-center text-rose-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-1/6" viewBox="0 0 512 512">
                    <path
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c-9.4 9.4-9.4 24.6 0 33.9l47 47-47 47c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l47-47 47 47c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-47-47 47-47c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-47 47-47-47c-9.4-9.4-24.6-9.4-33.9 0z" />
                </svg>
            </div>
        @endif
    </div>

@endsection
