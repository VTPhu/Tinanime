<?php

namespace App\Http\Controllers;


use App\Models\TinModel;
use App\Models\LoaitinModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $trending = DB::SELECT('SELECT * FROM `tin` WHERE noiBat=1 AND anHien=1 order by ngayDang DESC LIMIT 4');
        // phân trang và kết nối trong model
        // $tin = TinModel::orderBy('ngayDang', 'desc')->paginate(6);
        $tin = DB::table('tin')->join('loaitin', 'tin.idLT', '=', 'loaitin.id')
            ->select('tin.id', 'tin.tieuDe', 'loaitin.ten', 'tin.urlHinh', 'tin.tomTat', 'tin.noiDung', 'tin.ngayDang', 'tin.xem')
            ->orderBy('ngayDang', 'desc')->paginate(6);
        //hienratong tin trong loai
        $loaitin = DB::select('Select loaitin.id, loaitin.ten, count(*) as sotin from loaitin, tin where loaitin.id=tin.idLT group by loaitin.id, loaitin.ten');


        //Tìm kiếm
        if ($key = request()->key) {
            $tin = TinModel::orderBy('ngayDang', 'DESC')->where('tieuDe', 'like',   $key . '%')->paginate(50);
        }
        return view('user.home', compact('loaitin', 'tin', 'trending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hienthiloaitin()
    {
        $loaitin = DB::select('Select * from loaitin ');
        return view('user.loaitin', ['loaitin' => $loaitin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tintrongl($id)
    {
        //  $loaitin = DB::select('Select * from loaitin ');
        $loaitin = DB::select('Select loaitin.id, loaitin.ten, count(*) as sotin from loaitin, tin where loaitin.id=tin.idLT group by loaitin.id, loaitin.ten');


        $trending = DB::SELECT('SELECT * FROM `tin` WHERE noiBat=1 AND anHien=1 order by ngayDang DESC LIMIT 4');
        $tintrongloai = DB::select('SELECT * from tin where idLT=' . $id);





        return view('user.tintrongloai', compact('loaitin', 'trending', 'tintrongloai'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chitiettin($id)
    {
        // $loaitin = DB::select('Select * from loaitin ');
        $loaitin = DB::select('Select loaitin.id, loaitin.ten, count(*) as sotin from loaitin, tin where loaitin.id=tin.idLT group by loaitin.id, loaitin.ten');

        $trending = DB::SELECT('SELECT * FROM `tin` WHERE noiBat=1 AND anHien=1 order by ngayDang DESC LIMIT 4');
        $chitiettin = DB::select('SELECT * FROM tin WHERE id=' . $id);
        return view('user.chitiettin', compact('chitiettin', 'loaitin', 'trending'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loginlayout()
    {
        return view('Dangnhap.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $trending = DB::SELECT('SELECT * FROM `tin` WHERE noiBat=1 AND anHien=1 order by ngayDang DESC LIMIT 4');

        // phân trang và kết nối trong model
        $tin = DB::table('tin')->join('loaitin', 'tin.idLT', '=', 'loaitin.id')->select('tin.id', 'tin.tieuDe', 'loaitin.ten', 'tin.urlHinh', 'tin.tomTat', 'tin.noiDung', 'tin.ngayDang', 'tin.xem')->orderBy('ngayDang', 'desc')->paginate(6);
        // $loaitin = DB::select('Select * from loaitin ');
        $loaitin = DB::select('Select loaitin.id, loaitin.ten, count(*) as sotin from loaitin, tin where loaitin.id=tin.idLT group by loaitin.id, loaitin.ten');

        // Bắt lỗi
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $remember = $request->remember;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            if (Auth::user()->status != 1) {
                return redirect()->route('index')->with('message', 'tai khoan da bi khoa');
            }
            if (Auth::user()->role == 1) {
                return redirect('/');
            } else {
                return redirect('/admin');
            }
        } else {
            return redirect('/video');
        }
    }
    public function Registlayout()
    {
        return view('Dangnhap.dangki');
    }
    public function Regist(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6|max:30|alpha',
                'email' => 'required|email',
                'password' => 'required|min:6|max:16',
                'password_repeat' => 'required|same:password',

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $user = DB::table('users')->where('email', $request->email)->first();

            if (!$user) {
                $newUser = new UserModel();
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->password = $request->password;
                $newUser->role = $request->role;

                $newUser->status = $request->status;
                $newUser->password = Hash::make($request->password);


                $newUser->save();
                print_r($newUser);
                return redirect('/login')->with('message', 'Tao tai khoan thanh cong');
            } else {
                return redirect('/Regist')->with('message', 'Tai khoan da ton tai');
            }
        }
    }

    public function forgot_password()
    {
        return view('email.forgetpass');
    }
    public function forget_password(Request $req)
    {
        if ($req->isMethod('post')) {
            $validator = Validator::make($req->all(), [

                'email' => 'required|email',



            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $customer  = UserModel::where('email', $req->email)->first();
        $token = strtoupper(Str::random(10));
        $customer->update(['token' => $token]);
        Mail::send('email.check_mail', compact('customer'), function ($email) use ($customer) {
            $email->subject('Lấy lại mật khẩu!');
            $email->to($customer->email, $customer->name);
        });
        return redirect()->back()->with('message', 'Vui lòng check mail');
    }
    public function getPass(UserModel $customer, $token)
    {

        if ($customer->token == $token) {
            return view('email.getPass');
        }
        return abort(404);
    }

    public function postgetPass(UserModel $customer, $token, Request $req)
    {
        if ($req->isMethod('post')) {
            $validator = Validator::make($req->all(), [

                'password' => 'required|min:6|max:16',
                'password_repeat' => 'required|same:password',

            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $password = bcrypt($req->password);
        $customer->update(['password' => $password, 'token' => null]);
        return redirect('/login')->with('yes', 'Đặt lại mk thành công');
    }
    public function getActive()
    {
        return view('email.getActive');
    }

    public function postgetActive(Request $req)
    {
        if ($req->isMethod('post')) {
            $validator = Validator::make($req->all(), [

                'email' => 'required|email',



            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }
        $customer  = UserModel::where('email', $req->email)->first();
        $token = strtoupper(Str::random(10));
        $customer->update(['token' => $token]);
        Mail::send('email.getActive', compact('customer'), function ($email) use ($customer) {
            $email->subject('Lấy lại mk');
            $email->to($customer->email, $customer->name);
        });
        return redirect()->back()->with('yes', 'vui long check mail');
    }
}
