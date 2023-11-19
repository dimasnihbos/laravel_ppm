<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class dimasController extends Controller
{
    function index(){

        $judul = "Selamat Datang";
        //$pengaduan = DB::table ('pengaduan')->get();

        $data = Pengaduan::all();

        return view('home', ['TextJudul' => $judul, 'pengaduan' => $data]);

    }

    function delete($id){
        $pengaduan = DB :: table('pengaduan')->where('id_pengaduan', '=', $id)->delete();
  
         return redirect()->back();
      }

    function tampil_pengaduan(){
        return view('isi');
    }


    function isi_pengaduan(request $request){

        Auth::user();

        $nama_foto = $request->foto->getClientOriginalName();
        
        $request->validate([
            'isi_laporan' => 'required|min:10'
        ]);

        $request->foto->storeAs('public/image', $nama_foto);
    
        $isi = $request->isi_laporan;
        
        DB::table('pengaduan')->insert([
            'tgl_pengaduan' => date('Y-m-d'),
            'nik' => Auth::user()->nik,
            'isi_laporan' => $isi,
            'foto' => $request->foto->getClientOriginalName(),
            'status' => '0'
        ]);
        return redirect('home');


   
   } 

   function detail_($id){
    $pengaduan = DB::table('pengaduan')
            ->where('id_pengaduan', '=',$id)
            ->first();

    $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
    return view("detail-pengaduan", ["pengaduan" => $pengaduan]);
}

    function update($id){
        $id = (int) $id;        
        
        $affected = DB::table('pengaduan')
              ->where('id_pengaduan', $id)
              ->update(['isi_laporan' => request()->isi_laporan]);

    return redirect('home');
    }

    function edit($id){
        $pengaduan = DB::table('pengaduan')
              ->where('id_pengaduan', $id)
              ->first();

              $pengaduan = (array) $pengaduan;
            //   dd($pengaduan);
        return view('update-pengaduan', ["data" => $pengaduan]);
    }


}