<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengaduan;
use App\Models\Tanggapan;


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

    function prosesregis(Request $request){
        //var_dump($request->all());

        $data = DB::table("petugas")->insert([
            'id' => $request->id,
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level
        ]);
        return redirect("/home");
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
    
    function laporan(){

        $laporan = "Laporan Masyarakat";

        $data = Pengaduan::all();

        return view('laporan', ['laporan' => $laporan, 'pengaduan' => $data]);
    }

    function tanggap($id){
        $id = (int) $id;        
        
        $affected = DB::table('pengaduan')
               ->where('status', $id)
               ->update(['status' => request()->status]);

     return view('tanggap-pengaduan', ['data' => ['status' =>'0', 'isi_laporan' => 'isi']]);
    }

    function detail_pengaduan($id){
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        $tanggapan = DB::table('tanggapan')
        ->join('petugas', 'petugas.id', '=', 'tanggapan.id_petugas')
        ->where('tanggapan.id_pengaduan', $id)
        ->get();
        //return $tanggapan;
        return view("detail-petugas", ["data" => $pengaduan, 'tanggapan' => $tanggapan]);
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