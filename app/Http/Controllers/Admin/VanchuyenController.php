<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\donvan;
use App\nhavanchuyen;
use App\donnhang;
use App\Admin;
use auth;
use DB;

class VanchuyenController extends Controller
{
    public function getnhavanchuyen(){
    	$admin = Admin::where('id',auth::user()->id)->get();
    	$nhavanchuyen = nhavanchuyen::get();
    	return view('backend.listnhavanchuyen',compact('admin','nhavanchuyen'));
    }
    public function getthemmoidoitac(Request $request){
    	$d = substr('DT000000', 2, 5);
    	$n = 0;
    	$admin = Admin::where('id',auth::user()->id)->first();
    	$nhavanchuyen = DB::table('nhavanchuyens')->select('manhavanchuyen')->get();
    	if(isset($nhavanchuyen)){
    		$nhavanchuyen1 = DB::table('nhavanchuyens')->count('manhavanchuyen');
          	$nhavanchuyen2 = 'DT'.$d. ($nhavanchuyen1 + 1);
          	$nhavanchuyen = new nhavanchuyen();
          	$nhavanchuyen->manhavanchuyen = $nhavanchuyen2;
    		$nhavanchuyen->tennhavanchuyen = $request->tendt;
    		$nhavanchuyen->loaidoitac = $request->dt;
    		$nhavanchuyen->email = $request->emaildt;
    		$nhavanchuyen->phone = $request->phonedt;
    		$nhavanchuyen->diachi = $request->dcdt;
    		$nhavanchuyen->admin_id = $admin->id;
          	$nhavanchuyen->save();
    	}else{
    		$nhavanchuyen2 = 'DT' . $d . $n;
          	$nhavanchuyen = new nhavanchuyen();
          	$nhavanchuyen->manhavanchuyen = $nhavanchuyen2;
    		$nhavanchuyen->tennhavanchuyen = $request->tendt;
    		$nhavanchuyen->loaidoitac = $request->dt;
    		$nhavanchuyen->email = $request->emaildt;
    		$nhavanchuyen->phone = $request->phonedt;
    		$nhavanchuyen->diachi = $request->dcdt;
    		$nhavanchuyen->admin_id = $admin->id;
          	$nhavanchuyen->save();
    	}

    	return redirect()->back();
    }
}
