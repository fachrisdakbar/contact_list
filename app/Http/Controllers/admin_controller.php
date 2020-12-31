<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class admin_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $mails = DB::table('mails')->where('status', 'proses')->orderByDesc('created_at')->paginate(10);
        return view('admin.dashboard')->with('mails', $mails);
    }

    public function dashboard_detail($nomor_surat)
    {
        $mails = DB::table('mails')->where('nomor_surat', $nomor_surat)->get();
        return view('admin.dashboard_detail')->with('mails', $mails);
    }

    public function dashboard_detail_status($nomor_surat)
    {
        $status = DB::table('status')->get();
        $mails = DB::table('mails')->where('nomor_surat', $nomor_surat)->get();
        return view('admin.dashboard_detail_status')->with('mails', $mails)->with('status', $status);
    }

    public function dashboard_detail_status_store(Request $request)
    {
        //dd($request);
        DB::table('mails')->where('nomor_surat', $request->nomor_surat)->update([

            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        return Redirect::back();
    }

    public function mail_hapus($nomor_surat)
    {
        $mails = DB::table('mails')->where('nomor_surat', $nomor_surat)->delete();
        return redirect::back();
    }

    public function mail_disetujui()
    {
        $mails = DB::table('mails')->where('status', 'disetujui')->paginate(10);
        return view('admin.mail_disetujui')->with('mails', $mails);
    }

    public function mail_ditolak()
    {
        $mails = DB::table('mails')->where('status', 'ditolak')->paginate(10);
        return view('admin.mail_ditolak')->with('mails', $mails);
    }

    public function data_karyawan()
    {
        $data_karyawan = DB::table('data_karyawan')->paginate(10);
        return view('admin.data_karyawan')->with('data_karyawan', $data_karyawan);
    }

    public function data_karyawan_tambahdata()
    {
        return view('admin.data_karyawan_tambahdata');
    }

    public function data_karyawan_tambahdata_store(Request $request)
    {
        //dd($request);
        DB::table('data_karyawan')->updateOrInsert([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/data/karyawan');
    }

    public function data_karyawan_hapus($id_karyawan)
    {
        $data_karyawan = DB::table('data_karyawan')->where('id_karyawan', $id_karyawan)->delete();
        return redirect('/admin/data/karyawan');
    }

    public function data_karyawan_editdata($id_karyawan)
    {
        $data_karyawan = DB::table('data_karyawan')->where('id_karyawan', $id_karyawan)->get();
        return view('admin.data_karyawan_editdata')->with('data_karyawan', $data_karyawan);
    }

    public function data_karyawan_editdata_store(Request $request)
    {
        DB::table('data_karyawan')->where('id_karyawan', $request->id_karyawan)->update([
            'id_karyawan' => $request->id_karyawan,
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/admin/data/karyawan');
    }

    public function data_jurnalis_media()
    {
        $data_jurnalis = DB::table('users')->where('is_admin', '0')->paginate(10);
        return view('admin.data_jurnalis')->with('data_jurnalis', $data_jurnalis);
    }
    public function data_jurnalis_media_hapus($id)
    {
        $data_jurnalis = DB::table('users')->where('id', $id)->delete();
        return redirect('/admin/data/jurnalis');
    }
}
