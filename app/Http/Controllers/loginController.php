<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

    $data = [
        'email' => $request->email,
        'password'=>$request->password
    ];
     
    if( Auth::attempt($data)){
        return redirect()->route('admin.dashboard');
    }else{
        return redirect()->route('login')->with('failed','Email atau password salah !');
    }

    }

    public function logout(){
        if(Auth::logout()){}
        return redirect()->route('login')->with('success','Kamu Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('login')->with('register','Akun mu berhasil dibuat, silahkan login');

        // $login = [
        //     'email' => $request->email,
        //     'password'=>$request->password
        // ];
         
        // if( Auth::attempt($login)){
        //     return redirect()->route('admin.dashboard');
        // }else{
        //     return redirect()->route('login')->with('failed','Email atau password salah !');
        // }
    
    }
}
