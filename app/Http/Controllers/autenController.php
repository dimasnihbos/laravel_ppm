<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class autenController extends Controller

{
    function create()
    {
        $login = "Login";

        return view('login', ['login' => $login]);
    }

    function login(Request $request){
        $login = $request -> only("username", "password");
        if(Auth::attempt($login)){
            return redirect("/home");
        }else{
            return redirect("/login")->with("error","username atau password salah");
        }
    }

    function logout(){
        Auth::logout();

        return redirect("/login");
    }

    function register()
    {

        $register = "Registrasi";

        return view('regis', ['regis' => $register]);
    }

    function store(Request $request){
        //var_dump($request->all());

        $data = DB::table("masyarakat")->insert([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp
        ]);
        return redirect("/home");
    }
}