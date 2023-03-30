@extends('template.layout')

@section('title', 'Karir Wava Husada Kesamben')

@section('content')
    <h2 class="title-page">Selamat datang di halaman karir RS Wava Husada Kesamben</h2>
    <h5 class="my-5 text-center paragraph-text">Kami memberikan kesempatan untuk bergabung bersama kami.</h5>
    <div class="my-5 mx-20">
        @if (count($data) == 0)
            <h2 class="text-center text-4xl text-gray-600 font-bold my-20">Mohon Maaf, Lowongan Kerja Belum ada</h2>
        @else
            @foreach ($data as $loker)
                <a href="/detail/{{ $loker->id }}">
                    <div class="card">
                        <h2 class="card-title gap-2 flex items-center"><i
                                class="fa fa-briefcase"></i><span>{{ $loker->nama_pekerjaan }}</span></h2>
                        <span class="card-content flex items-center gap-2 mt-3"><i
                                class="fa fa-circle text-green-700"></i><span>Dibuka
                                sampai {{ date('d F Y', strtotime($loker->deadline)) }}</span></span>
                        <hr class="my-3" />
                        <div class="flex justify-between mx-5 items-center">
                            <div class="flex items-center gap-2">
                                <i class="fa fa-user-graduate"></i>
                                <span>{{ $loker->min_pendidikan }}</span>
                            </div>
                            <button class="btn-secondary flex gap-2 items-center"><span>Lihat Selengkapnya</span><i
                                    class="fa fa-arrow-right"></i></button>
                        </div>
                    </div>
                </a>
            @endforeach

        @endif
    </div>
@endsection
