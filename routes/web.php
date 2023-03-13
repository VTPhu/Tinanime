<?php

use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;

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

Route::get('/',[Usercontroller::class,'index']);
Route::get('/loait',[Usercontroller::class,'hienthiloaitin']);
Route::get('/tintrongloai/{id}',[Usercontroller::class,'tintrongl']);
Route::get('/chitiet/{id}',[Usercontroller::class,'chitiettin']);
Route::get('/login',[UserController::class,'loginlayout'])->name('loginlayout');
Route::post('/login', [UserController::class, 'login']);
Route::get('/Regist',[UserController::class,'Registlayout']);
Route::post('/Regist', [UserController::class, 'Regist']);
Route::get('/admin',[Admincontroller::class,'Adminhome']);
Route::get('/admin/dslt',[Admincontroller::class,'danhsachlt']);
Route::get('/admin/themlt',[Admincontroller::class,'themlt']);
Route::post('/admin/themlt',[Admincontroller::class,'themloaitin']);
Route::get('/video',[Admincontroller::class,'video']);
Route::get('/forgot_password',[Usercontroller::class,'forgot_password'])->name('customer.forgetPass');
Route::post('/forgot_password',[Usercontroller::class,'forget_password']);
Route::get('/get_password/{customer}/{token}',[Usercontroller::class,'getPass'])->name('customer.getPass');
Route::post('/get_password/{customer}/{token}',[Usercontroller::class,'postgetPass']);
Route::get('/get_active',[Usercontroller::class,'getActive'])->name('customer.getActive');
Route::post('/get_active',[Usercontroller::class,'postgetActive'])->name('customer.postgetActive');
Route::get('/admin/capnhat/{id}',[Admincontroller::class,'capnhat']);
Route::post('/admin/capnhat/{id}',[Admincontroller::class,'postCapnhat']);
Route::get('/admin/xoa/{id}',[Admincontroller::class,'delete']);
Route::get('/admin/dst',[Admincontroller::class,'danhsachtin']);
Route::get('/admin/themt',[Admincontroller::class,'themt']);
Route::post('/admin/themt',[Admincontroller::class,'themtin']);
Route::get('/admin/capnhattin/{id}',[Admincontroller::class,'capnhattin']);
Route::post('/admin/capnhattin/{id}',[Admincontroller::class,'postCapnhattin']);
Route::get('/admin/xoad/{id}',[Admincontroller::class,'deleted']);