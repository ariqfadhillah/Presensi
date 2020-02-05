<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Yajra\Datatables\Datatables;
use DB;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $detail = \App\Detail::where('deviceSn','LIKE','%'.$request->cari.'%')->get();
        }else{
            $detail = \App\Detail::all();
        }
        
        return view('detail.index',['detail' => $detail]);
    }

    public function details(Request $request,$id)
    {

        $presensi = \App\Detail::where('deviceSN', $id)->get();

        $data_device = \App\Presensi::where('serialnumber', $id)->get();

        return view('detail.detail', compact('presensi','data_device'));

        // return Datatables::of($presensi)
        // ->make(true) ;

    }

    public function showdata(Request $request, $id)
    {   

        $presensi = DB::table('temp_inout')->select(['deviceSN','pin', 'time', 'status']);
        $dddd = \App\Detail::where('deviceSN', $id)->get();
        // $dddd = \App\Detail::where('deviceSN', '=', 'ACEH191360112')->get();
        return Datatables::of($dddd)
             ->make(true) ;
    }
}
