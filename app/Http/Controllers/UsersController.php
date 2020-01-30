<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Hash;

class UsersController extends Controller
{
    public function index()
    {
    	$query = \App\User::all();
    	return view('user.index', compact('query'));
    }

    public function create(Request $request)
    {   
        // insert ke tabel users ini kalo manual
        $user = new \App\User;
        $user->role =$request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); //trus tambahkan slice (\)
        $user->remember_token = \Str::random(60); //kalo di laravel 6 kebawah pakainya underscore(_)
        $user->save();

        $request->request->add(['id' => $user->id]);
        return redirect('/users')->with('sukses','Data sudah berhasil');
    }

    public function edit($id)
    {
    	$query = \App\User::find($id);
    	return view('user/edit',['query' => $query]);
    }

	public function update(Request $request,$id)
	{
    	$query = \App\User::find($id);
    	$query->update($request->all());
    	return redirect('/users')->with('sukses','Data berhasil diupdate');
    	}

    public function delete($id)
    {	
        $query = \App\User::find($id);
        $query->delete();
        return redirect('/users')->with('sukses','Data berhasil di delete');
    }

    public function setting($id)
    {
        $query = \App\User::find($id);
        return view('user.profile',['query' => $query]);
    }

    public function update_setting(Request $request,$id)
    {
        $query = $request->only(["name","email","password"]);
        $query['password'] = Hash::make($query['password']);
        \App\User::find($id)->update($query);

        return redirect()->action('UsersController@setting', ['id' => $id]);
        // return redirect()->action('HomeController@index');
        }
}
