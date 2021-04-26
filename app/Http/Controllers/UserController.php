<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;//user model can kiem tra
use Auth; //use thư viện auth
use App\chitietusers;
use App\donhang;
use App\congtien;
use App\naptien;
use Carbon\Carbon;
use App\thongso;

class UserController extends Controller
 {

    public function getdangky()
    {
        $data['thongso'] = thongso::sum('tygia');
        return view('auth.register',$data);
    }
    public function postdangky(Request $request)
    {
         $dt = Carbon::now()->toDateString();
        $newuser = new User();
        $newuser->name = $request ->name;
        $newuser->email = $request ->email;
        $newuser->password = bcrypt($request['password']);
        $newuser->date = $dt;
        $newuser->save();

        $user = User::max('id');
      
        $chitietuser = new chitietusers();
        $chitietuser->userss_id = $user;
        $chitietuser->save();
        
        //dd($newuser);
        return redirect()->route('login');
    }
    public function getcapnhat(){
        $thongso = thongso::sum('tygia');
        $user = User::select('name','email','hoten','gioitinh','ngaysinh','facebook','sodienthoai','diachi','thanhpho')
        ->join('chitietusers','chitietusers.userss_id','=','users.id')
        ->where('users.id',Auth::user()->id)->get();

        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
       
       
        return view('frontend.canhan',compact('user','tiennap',$thongso));
    }
    public function postcapnhat(Request $request){
        $chitietuser = chitietusers::join('users','users.id','=','chitietusers.userss_id')->where('users.id',Auth::user()->id)->select('chitietusers.id')->first();
        $chitietuser->userss_id = Auth::user()->id;
        $chitietuser->hoten = $request->hovaten;
        $chitietuser->gioitinh = $request->gioitinh;
        $chitietuser->ngaysinh = $request->ngaysinh;
        $chitietuser->facebook = $request->facebook;
        $chitietuser->sodienthoai = $request->phone;
        $chitietuser->diachi = $request->loca;
        $chitietuser->thanhpho = $request->address;
        $chitietuser->save();

        return redirect()->route('canhan');
    }
    public function postcapnhattt(Request $request,$id){
            $chitietuser = chitietusers::join('users','users.id','=','chitietusers.userss_id')->where('users.id',Auth::user()->id)->select('chitietusers.id')->first();
            $chitietuser->userss_id = Auth::user()->id;
            $chitietuser->hoten = $request->hovaten;
            $chitietuser->sodienthoai = $request->phone;
            $chitietuser->diachi = $request->loca;
            $chitietuser->thanhpho = $request->address;
            $chitietuser->save();
            //dd($chitietuser);
          return redirect()->back();
    }
}