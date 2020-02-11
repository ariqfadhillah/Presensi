<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;
use Yajra\Datatables\Datatables;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$query = \App\User::all();
    	return view('user.index', compact('query'));
    }

    public function getBasicData(Request $request)
     {
        $users = DB::table('users')
            ->select(['id','name', 'email','role']);


        // https://stackoverflow.com/questions/45535394/laravel-datatables-multiple-actions-edit-delete-delete-displayed-as-text
        return Datatables::of($users)
            ->addColumn('action', function ($users) {
                return '<a href="/users/'.$users->id.'/edit/" class="btn btn-warning btn-sm">Edit</a>';
            })
            ->editColumn('delete', function ($users) {
                return '<a href="/users/'.$users->id.'/delete" class="btn btn-danger btn-sm">delete</a>';
            })
            ->rawColumns(['delete' => 'delete','action' => 'action'])
            ->make(true);
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
        $query = $request->only(["name","email"]);
        // $query['password'] = Hash::make($query['password']);
        \App\User::find($id)->update($query);

        return redirect()->action('UsersController@setting', ['id' => $id]);
        // return redirect()->action('HomeController@index');
    }

    public function showChangePasswordForm()
        {
        return view('auths.changepassword');
    }

    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password yang kamu masukan tidak benar. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan yang lama. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|same:new-password_confirmation',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Berhasil diganti !");

    }

}
