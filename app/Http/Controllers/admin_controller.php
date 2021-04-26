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
        $costumers = DB::table('costumers')->orderByDesc('created_at')->paginate(10);
        return view('admin.dashboard')->with('costumers', $costumers);
    }

    public function dashboard_detail($id)
    {
        $costumers = DB::table('costumers')->where('id', $id)->get();
        return view('admin.dashboard_detail')->with('costumers', $costumers);
    }

    public function dashboard_detail_status($id)
    {
        $status = DB::table('status')->get();
        $costumers = DB::table('costumers')->where('id', $id)->get();
        return view('admin.dashboard_detail_status')->with('costumers', $costumers)->with('status', $status);
    }

    public function dashboard_detail_status_store(Request $request)
    {
        //dd($request);
        DB::table('costumers')->where('id', $request->id)->update([

            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        return Redirect::back();
    }

    public function costumer_hapus($id)
    {
        $costumers = DB::table('costumers')->where('id', $id)->delete();
        return redirect::back();
    }

    public function costumer_disetujui()
    {
        $costumers = DB::table('costumers')->where('status', 'qualified')->paginate(10);
        return view('admin.costumer_disetujui')->with('costumers', $costumers);
    }

    public function costumer_ditolak()
    {
        $costumers = DB::table('costumers')->where('status', 'pending')->paginate(10);
        return view('admin.costumer_ditolak')->with('costumers', $costumers);
    }

    public function costumer_uncontacted()
    {
        $costumers = DB::table('costumers')->where('status', 'uncontacted')->paginate(10);
        return view('admin.costumer_uncontacted')->with('costumers', $costumers);
    }

    public function costumer_lost()
    {
        $costumers = DB::table('costumers')->where('status', 'lost')->paginate(10);
        return view('admin.costumer_lost')->with('costumers', $costumers);
    }

    public function data_karyawan()
    {
        $data_karyawan = DB::table('data_karyawan')->paginate(10);
        return view('admin.data_karyawan')->with('data_karyawan', $data_karyawan);
    }

   
    public function status_contact(Request $request, Status $status)
    {
        $status_contact = DB::table('status')->all()->paginate(10);
        return view('admin.data_status')->with('status_contact', $status_contact);
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
    //Add New Contact
    public function ajukan_contact()
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        return view('admin.ajukan_contact')->with('data_karyawan', $data_karyawan);

        $statuz = \DB::table('status')
        ->select('status.status')
        ->get();

        // $nameListEmployees = \DB::table('employees')
        // ->select('employees.nama_employee')
        // ->get();
        return view('admin.ajukan_contact')->compact('status', $statuz);
    
        // return view('admin.incidents.create', compact('nameList', $nameList, 'nameListEmployees', $nameListEmployees));
    }

    public function ajukan_contact_store(Request $request)
    {
        //dd($request);
        DB::table('costumers')->updateOrInsert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'status' => ('Pending'),
        ]);
        return Redirect('/home');
    }

    public function contact_edit($id)
    {
        $data_karyawan = DB::table('data_karyawan')->get();
        $costumers = DB::table('costumers')->where('id', $id)->get();
        return view('admin.costumer_edit')->with('costumers', $costumers)->with('data_karyawan', $data_karyawan);
    }

    public function contact_edit_store(Request $request)
    {
        //dd($request);
        DB::table('costumers')->updateOrInsert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'ditujukan_kepada' => $request->ditujukan_kepada,
            'status' => ('Pending'),
        ]);
        return Redirect('/home');
    }

    public function contact_hapus($id)
    {
        $costumers = DB::table('costumers')->where('id', $id)->delete();
        return Redirect('/home');
    }

    public function agent()
    {
        $agent = DB::table('data_karyawan')->paginate(10);
        return view('admin.agent')->with('agent', $agent);
    }
}
