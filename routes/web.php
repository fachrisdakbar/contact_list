<?php

use App\Http\Controllers\admin_controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

//user
Route::get('/home', [App\Http\Controllers\user_controller::class, 'dashboard'])->name('home');
Route::get('/home/ajukan_surat', [App\Http\Controllers\user_controller::class, 'ajukan_surat'])->name('ajukan_surat');
Route::post('/home/ajukan_surat/store', [App\Http\Controllers\user_controller::class, 'ajukan_surat_store'])->name('ajukan_surat_store');
Route::get('/home/surat/edit/{nomor_surat}', [App\Http\Controllers\user_controller::class, 'surat_edit'])->name('surat_edit');
Route::post('/home/surat/edit/store', [App\Http\Controllers\user_controller::class, 'surat_edit_store'])->name('surat_edit_store');
Route::get('/home/surat/hapus/{nomor_surat}', [App\Http\Controllers\user_controller::class, 'surat_hapus'])->name('surat_hapus');

Route::get('/home/narasumber', [App\Http\Controllers\user_controller::class, 'narasumber'])->name('narasumber');



// admin
Route::get('/admin/dashboard', [admin_controller::class, 'dashboard'])->name('admin_dashboard')->middleware('is_admin');
Route::get('/admin/dashboard/detail/{nomor_surat}', [admin_controller::class, 'dashboard_detail'])->name('admin_dashboard_detail')->middleware('is_admin');
Route::get('/admin/dashboard/detail/status/{nomor_surat}', [admin_controller::class, 'dashboard_detail_status'])->name('admin_dashboard_detail_status')->middleware('is_admin');
Route::post('/admin/dashboard/detail/status/store', [admin_controller::class, 'dashboard_detail_status_store'])->middleware('is_admin');
Route::get('/admin/dashboard/mail/hapus/{nomor_surat}', [admin_controller::class, 'mail_hapus'])->middleware('is_admin');

Route::get('/admin/mail/disetujui', [admin_controller::class, 'mail_disetujui'])->name('mail_disetujui')->middleware('is_admin');
Route::get('/admin/mail/ditolak', [admin_controller::class, 'mail_ditolak'])->name('mail_ditolak')->middleware('is_admin');


Route::get('/admin/data/karyawan', [admin_controller::class, 'data_karyawan'])->name('data_karyawan')->middleware('is_admin');
Route::get('/admin/data/karyawan/tambahdata', [admin_controller::class, 'data_karyawan_tambahdata'])->name('data_karyawan_tambahdata')->middleware('is_admin');
Route::get('/admin/data/karyawan/hapus/{id_karyawan}', [admin_controller::class, 'data_karyawan_hapus'])->name('data_karyawan_hapus')->middleware('is_admin');
Route::post('/admin/data/karyawan/tambahdata/store', [admin_controller::class, 'data_karyawan_tambahdata_store'])->name('data_karyawan_tambahdata_store')->middleware('is_admin');
Route::get('/admin/data/karyawan/editdata/{id_karyawan}', [admin_controller::class, 'data_karyawan_editdata'])->name('data_karyawan_editdata')->middleware('is_admin');
Route::post('/admin/data/karyawan/editdata/store', [admin_controller::class, 'data_karyawan_editdata_store'])->name('data_karyawan_editdata_store')->middleware('is_admin');


Route::get('/admin/data/jurnalis', [admin_controller::class, 'data_jurnalis_media'])->name('data_jurnalis_media')->middleware('is_admin');
Route::get('/admin/data/jurnalis/hapus/{id}', [admin_controller::class, 'data_jurnalis_media_hapus'])->name('data_jurnalis_media_hapus')->middleware('is_admin');
