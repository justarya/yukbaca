<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Siswa;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('/login')->with('alert','Kamu harus login dulu');
        }
        else{
            return redirect('/admin/peminjaman');
        }
    }
    public function login(){
        return view('admin.login');
    }
    public function loginForm(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = User::where('username',$username)->first();
        if(!empty($data)){ //apakah email tersebut ada atau tidak
            if($password == $data->password){
                Session::put('username',$data->username);
                Session::put('id_user',$data->id);
                Session::put('role',$data->role);
                Session::put('login',TRUE);
                // if($data->role > 0){
                    return redirect('/admin');
                // }
            }
            else{
                return redirect('/login')->with('alert','Password atau Username, Salah !'.Hash::check($password,$data->password));
            }
        }
        else{
            return redirect('/login')->with('alert','Password atau Username, Salah!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/login')->with('alert','Kamu sudah logout');
    }
}
