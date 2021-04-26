<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use App\User;
use Carbon\Carbon;
use DB;
use App\donvan;

class AdminConTroller extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doanhthu = donhang::where('status','kết thúc đơn')->sum('totalqty');
        $sodon = donhang::where('status','kết thúc đơn')->count('id');
        $dt = Carbon::now()->toDateString();
         // $bayngay = Carbon::now()->subDay(7)->toDateString();
        
        $member = User::select('name')->where('date',$dt)->count();
        
        $donhang = db::table('donhangs')->count('madonhang');

        $chogiao = donvan::where('status','Chờ giao hàng')->count('madonvan');

        $huy = donhang::where('status','hủy đơn hàng')->count('madonhang');

        $trahang = donhang::where('status','Khách trả hàng')->count('madonhang');
      


        
        return view('backend.index',compact('doanhthu','sodon','member','donhang','chogiao','huy','trahang'));
    }
    public function postLogout(){
        Auth::logout();
        return redirect('login');
    }
}
