<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\VerifyAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//user page---------------------------->
Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', [UserController::class, 'index']);
Route::get('/detail/{id}', [UserController::class, 'detail']);
Route::get('/submit/{id_pekerjaan}', [UserController::class, 'submit_page']);

Route::post('/review', [UserController::class, 'review_submit']);
Route::post('/sending_lamaran', [UserController::class, 'send_mail']);

//admin page --------------------------->
Route::get('/carrier_4Dm1N_P4n3L', function () {
    return redirect('/carrier_4Dm1N_P4n3L/dashboard');
})->middleware(AuthAdmin::class);

Route::get('/carrier_4Dm1N_P4n3L/login', function () {
    return view('admin.login');
})->middleware(VerifyAdmin::class);

Route::post('/carrier_4Dm1N_P4n3L/do_login', [AuthController::class, 'login']);
Route::get('/carrier_4Dm1N_P4n3L/logout', [AuthController::class, 'logout']);
Route::get('/carrier_4Dm1N_P4n3L/dashboard', [AdminController::class, 'dashboard'])->middleware(AuthAdmin::class);
Route::get('/carrier_4Dm1N_P4n3L/carrier', [CarrierController::class, 'index'])->middleware(AuthAdmin::class);
Route::get('/carrier_4Dm1N_P4n3L/add_carrier', function () {
        session(['page' => 'loker']);
        return view('admin.add_carrer');
})->middleware(AuthAdmin::class);
Route::post('/carrier_4Dm1N_P4n3L/adding', [CarrierController::class, 'add'])->middleware(AuthAdmin::class);
Route::get('/carrier_4Dm1N_P4n3L/carrier/delete/{id}', [CarrierController::class, 'delete'])->middleware(AuthAdmin::class);
Route::get('/carrier_4Dm1N_P4n3L/carrier/publish/{id}', [CarrierController::class, 'publish'])->middleware(AuthAdmin::class);
Route::any('/carrier_4Dm1N_P4n3L/carrier/edit/{id}', [CarrierController::class, 'update'])->middleware(AuthAdmin::class);

Route::get('//carrier_4Dm1N_P4n3L/pelamar', [PelamarController::class, 'index'])->middleware(AuthAdmin::class);
Route::get('//carrier_4Dm1N_P4n3L/pelamar/delete/{id}', [PelamarController::class, 'delete'])->middleware(AuthAdmin::class);
