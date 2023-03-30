@extends('template.layout_admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="grid grid-cols-2">
        <div>
            <div class="card-dashboard bg-cyan-200">
                <h3 class="font-bold text-lg text-center">Total Lowongan Kerja</h3>
                <h5 class="text-center text-8xl text-gray-800 my-10 font-bold">{{$loker}}</h5>
            </div>
            <div class="grid grid-cols-2 gap-5">
                <div class="card-dashboard bg-green-200">
                    <h3 class="font-bold text-lg text-center">Lowongan Dibuka</h3>
                    <h5 class="text-center text-6xl text-gray-800 my-10 font-bold">{{$open}}</h5>
                    <h5 class="text-center text-sm text-gray-800 mb-5 font-semibold">aktif</h5>
                </div>
                <div class="card-dashboard bg-red-200">
                    <h3 class="font-bold text-lg text-center">Lowongan Ditutup</h3>
                    <h5 class="text-center text-6xl text-gray-800 my-10 font-bold">{{$closed}}</h5>
                    <h5 class="text-center text-sm text-gray-800 mb-5 font-semibold">tidak aktif</h5>
                </div>
            </div>
        </div>
        <div class="card-dashboard bg-orange-200">
            <h3 class="font-bold text-lg text-center">Jumlah Pelamar</h3>
            <h5 class="text-center text-8xl text-gray-800 my-10 font-bold">{{$pelamar}}</h5>
            
        </div>
    </div>
{{-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button> --}}
  
  
  
@endsection