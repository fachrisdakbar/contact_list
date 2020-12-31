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
        $mails = DB::table('mails')->where('surat_dari', (Auth::user()->name))->paginate(10);
        return view('user.dashboard')->with('mails', $mails);
    }

    public function ajukan_surat()
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        return view('user.ajukan_surat')->with('data_karyawan', $data_karyawan);
    }

    public function ajukan_surat_store(Request $request)
    {
        //dd($request);
        DB::table('mails')->updateOrInsert([
            'judul_surat' => $request->judul_surat,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'surat_dari' => (Auth::user()->name),
            'isi_surat' => $request->isi_surat,
            'status' => ('proses'),
        ]);
        return Redirect('/home');
    }

    public function surat_edit($nomor_surat)
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        $mails = DB::table('mails')->where('nomor_surat', $nomor_surat)->get();
        return view('user.surat_edit')->with('mails', $mails)->with('data_karyawan', $data_karyawan);
    }

    public function surat_edit_store(Request $request)
    {
        //dd($request);
        DB::table('mails')->where('nomor_surat', $request->nomor_surat)->update([
            'nomor_surat' => $request->nomor_surat,
            'judul_surat' => $request->judul_surat,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'surat_dari' => (Auth::user()->name),
            'isi_surat' => $request->isi_surat,
            'status' => ('proses'),
        ]);
        return Redirect('/home');
    }

    public function surat_hapus($nomor_surat)
    {
        $mails = DB::table('mails')->where('nomor_surat', $nomor_surat)->delete();
        return Redirect('/home');
    }

    public function narasumber()
    {
        $narasumber = DB::table('data_karyawan')->paginate(10);
        return view('user.narasumber')->with('narasumber', $narasumber);
    }
}
