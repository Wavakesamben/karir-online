<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        $username = $request->input('in_username');
        $password = md5($request->input('in_password'));
        
        $data = User::where(['email' => $username])->first();
        if($data != null){
            if($password != $data->password){
                session()->flash('message', 'Password Salah');
                return redirect('/carrier_4Dm1N_P4n3L/login');
            }
            $data_session = bcrypt($data->email);
            session(['admin' => $data_session, 'expires' => now()->addMinutes(30)]);
            session(['page' => 'dashboard']);
            return redirect('/carrier_4Dm1N_P4n3L');
        }else{
            session()->flash('message', 'Username/Email tidak ditemukan');
            return redirect('/carrier_4Dm1N_P4n3L/login');
        }

    }

    public function logout(Request $request){
        $request->session()->forget('admin');
        $request->session()->forget('page');
        return redirect('/carrier_4Dm1N_P4n3L/login');
    }
}
