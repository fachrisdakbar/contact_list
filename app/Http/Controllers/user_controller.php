<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Template\Template;

class user_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $costumers = DB::table('costumers')->where('ditujukan_kepada', (Auth::user()->name))->paginate(10);
        return view('user.dashboard')->with('costumers', $costumers);
    }

    public function ajukan_contact()
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        return view('user.ajukan_contact')->with('data_karyawan', $data_karyawan);
    }

    public function ajukan_contact_store(Request $request)
    {
        //dd($request);
        DB::table('costumers')->updateOrInsert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'status' => ('proses'),
        ]);
        return Redirect('/home');
    }

    public function contact_edit($id)
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        $costumers = DB::table('costumers')->where('id', $id)->get();
        return view('user.contact_edit')->with('costumers', $costumers)->with('data_karyawan', $data_karyawan);
    }

    public function contact_edit_store(Request $request)
    {
        //dd($request);
        DB::table('costumers')->where('id', $request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'status' => ('proses'),
        ]);
        return Redirect('/home');
    }

    public function contact_hapus($id)
    {
        $costumers = DB::table('costumers')->where('id', $id)->delete();
        return Redirect('/home');
    }

    public function narasumber()
    {
        $narasumber = DB::table('data_karyawan')->paginate(10);
        return view('user.narasumber')->with('narasumber', $narasumber);
    }
}
