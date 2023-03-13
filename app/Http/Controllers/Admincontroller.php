<?php

namespace App\Http\Controllers;

use App\Models\LoaitinModel;
use App\Models\UserModel;
use App\Models\TinModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
class Admincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Adminhome()
    {
       if(Auth::check('user')){
        return view('admin.home');
       }
        
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function danhsachlt()
    {
        $dslt = LoaitinModel::all();
      
        return view('admin.dsloaitin',compact('dslt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function themlt()
    {
        return view('admin.themlt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function themloaitin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'ten'=>'required',
            'thuTu' => 'required',
            'anHien' => 'required|numeric|between:0,3'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $dslt = LoaitinModel::all();
       
        $loaitin = new LoaitinModel;
        $loaitin->id=$_POST['id'];
        $loaitin->ten=$_POST['ten'];
        $loaitin->thuTu=$_POST['thuTu'];
        $loaitin->anHien=$_POST['anHien'];
        $loaitin->save();
        
        return redirect('/admin/dslt');
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function video()
    {
        return view('Dangnhap.loginloi');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function capnhat($id)
    {
       $loait = loaitinModel::find($id);
       if($loait==null) return redirect('/thongbao');
       return view('admin.capnhat',['loait'=>$loait]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postCapnhat($id, Request  $request)
    {
        $validator = Validator::make($request->all(), [
            
            'ten'=>'required|alpha',
            'thuTu' => 'required',
            'anHien' => 'required|numeric|between:0,3'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $loait = LoaitinModel::find($id);
        if($loait==null)  return redirect('/thongbao');
       
        $loait->ten = $_POST['ten'];
        $loait->thuTu= $_POST['thuTu'];
        $loait->anHien = $_POST['anHien'];
        
        $loait->save();
        
        
        return redirect('/admin/dslt');


    }
   
    function delete($id)
    {
        $dslt=LoaitinModel::find($id);
       
        $dslt->delete();

        return redirect('/admin/dslt');
    }
    public function danhsachtin()
    {
        $dst = TinModel::all();
        
        return view('admin.dstin',compact('dst'));
    }
    public function themt()
    {
        return view('admin.themt');
    }
    public function themtin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tieuDe'=> 'required',
            'tomTat'=> 'required',
            'urlHinh'=> 'required',
            'ngayDang'=>'required',
            'noiDung' => 'required',
            'idLT'=> 'required',
            'xem'=> 'required',
            'noiBat'=> 'required',
            'anHien' => 'required|numeric|between:0,3',
            'tags'=> 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $dst = TinModel::all();
       
        $tin = new TinModel;
       
        $tin->tieuDe=$_POST['tieuDe'];
        $tin->tomTat=$_POST['tomTat'];
        $tin->urlHinh=$_POST['urlHinh'];
        $tin->ngayDang=$_POST['ngayDang'];
        $tin->noiDung=$_POST['noiDung'];
        $tin->idLT=$_POST['idLT'];

        $tin->xem=$_POST['xem'];
        $tin->noiBat=$_POST['noiBat'];
        $tin->tags=$_POST['tags'];
        $tin->anHien=$_POST['anHien'];
        $tin->save();
        
        return redirect('/admin/dst');
        
    }
    public function capnhattin($id)
    {
       $tin = TinModel::find($id);
       if($tin==null) return redirect('/thongbao');
       return view('admin.capnhattin',['tin'=>$tin]);
    }

    public function postCapnhattin($id, Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'tieuDe'=> 'required',
            'tomTat'=> 'required',
            'urlHinh'=> 'required',
            'ngayDang'=>'required',
            'noiDung' => 'required',
            'idLT'=> 'required',
            'xem'=> 'required',
            'noiBat'=> 'required',
            'anHien' => 'required|numeric|between:0,3',
            'tags'=> 'required',
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $tin = TinModel::find($id);
        if($tin==null)  return redirect('/thongbao');
       
       
        $tin->tieuDe=$_POST['tieuDe'];
        $tin->tomTat=$_POST['tomTat'];
        $tin->urlHinh=$_POST['urlHinh'];
        $tin->ngayDang=$_POST['ngayDang'];
        $tin->noiDung=$_POST['noiDung'];
        $tin->idLT=$_POST['idLT'];

        $tin->xem=$_POST['xem'];
        $tin->noiBat=$_POST['noiBat'];
        $tin->tags=$_POST['tags'];
        $tin->anHien=$_POST['anHien'];
        $tin->save();
        
        return redirect('/admin/dst');


    }
    function deleted($id)
    {
        $dst=TinModel::find($id);
        if($dst==null) return redirect('/thongbao');
        $dst->delete();

        return redirect('/admin/dst');
    }






}
