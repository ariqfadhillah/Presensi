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
            $detail = \App\Detail::paginate(10);
        }
        
        return view('detail.index',['detail' => $detail]);
    }

    public function details($id)
    {

        $presensi = \App\Detail::where('deviceSN', $id)->get();

        $data_device = \App\Presensi::where('serialnumber', $id)->get();
        // return view('detail/detail',['presensi' => $presensi]);
        return view('detail.detail', compact('presensi','data_device'));

    }

    public function showdata(Request $request)
    {   

        $presensi = DB::table('temp_inout')->select(['deviceSN','pin', 'time', 'status']);
        
        return Datatables::eloquent($presensi)
        ->addColumn('time', function($id){
            return $id->deviceSN();
        })
        ->addColumn('pin', function($id){
            return $id->deviceSN();
        })
        ->rawColumns(['time','pin'])
        ->tojson();
    }
}
