<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RekapController extends Controller
{
    public function index()
    {
        $rekapp = \App\Rekap::all();

        $device = DB::table('device')
            ->join('temp_inout', 'serialnumber', '=', 'deviceSN')
            ->select('serialnumber', 'location', 
                \DB::raw('count(serialnumber) as type_count'))
            ->groupBy('serialnumber')
            ->get();

        return view('rekap.index', compact('device'));

    }

}
