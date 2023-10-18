<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class masyarakatController extends Controller
{
    function rakyat(){

        $masyarakat = DB::table('masyarakat')->get();

        //$data = Masyarakat::all();

        return view('masyarakat', ['masyarakat' => $masyarakat]);

    }


}
