@extends('template.layout')

@section('title', 'Login Admin')

@section('content')
    <div class="flex justify-center h-screen items-center">

        <div class="bg-white my-10 px-10 py-10 rounded-xl shadow-xl shadow-gray-300 w-1/3">
            <h2 class="text-center text-gray-800 font-bold text-2xl">Login Admin Panel</h2>
            @if (session()->has('message'))
                <h5 class="text-red-600 text-center mt-4 font-semibold text-sm">{{ session('message') }}</h5>
            @endif
            <form action="/carrier_4Dm1N_P4n3L/do_login" method="post">
                @csrf
                <div class="input-group">
                    <label for="in_nama">Email</label>
                    <input type="email" id="in_username" name="in_username" placeholder="Masukan email" required>
                </div>
                <div class="input-group">
                    <label for="in_nama">Password</label>
                    <input type="password" id="in_password" name="in_password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
