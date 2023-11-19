<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class petugasController extends Controller
{
    function logpetugas(){
       // return Hash::make("555");
        $login = "Login Petugas";

        return view('loginpetugas', ['loginpetugas' => $login]);
    }

    function create(Request $request){
        $login = $request -> only("username", "password");
        if(Auth::guard("Petugas")->attempt($login)){
            return redirect("/home");
        }else{
            return redirect("/loginpetugas")->with("error","username atau password salah");
        }
    }

    function logoutpetugas(){
        Auth::guard("petugas")->logout();

        return redirect("/loginpetugas");
    }

    function petugas(){

        $petugas = DB::table('petugas')->get();

        return view('petugas', ['petugas' => $petugas]);

    }

    function regispetugas()
    {

        $login = "Register Petugas";

        return view('regispetugas', ['regispetugas' => $login]);
    }

    function proses(Request $request){
        
        $data = $request->only('username', 'password');
        $login = Auth::guard('petugas')->attempt($data);
         if ($login) {
            return redirect('homepetugas');
         } else {
            return redirect('loginpetugas')->with("error", "username atau password salah");
         }

        return redirect("/home");
    }

    function hom(){
        return view('homepetugas');
    }
}

//    $data = DB::table("petugas")->insert([
    //         'id' => $request->id,
    //         'nama_petugas' => $request->nama,
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'telp' => $request->telp,
    //         'level' => $request->level
    //     ]);