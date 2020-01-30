<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function index()
    {
        $data_device = \App\Presensi::all();
    	return view('presensi.index',['data_device' => $data_device]);
    }

    public function create(Request $request)
    {
    	$presensi = \App\Presensi::create($request->all());
    	return redirect('/presensi')->with('sukses','Data sudah berhasil');
    }

    public function edit($id)
    {
    	$presensi = \App\Presensi::find($id);
    	return view('presensi/edit',['presensi' => $presensi]);
    }

    public function update(Request $request,$id)
    {
    	$presensi = \App\Presensi::find($id);
    	$presensi->update($request->all());
   		return redirect('/presensi')->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {	
    	$presensi = \App\Presensi::find($id);
    	$presensi->delete();
    	return redirect('/presensi')->with('sukses','Data berhasil di delete');
    }
}
