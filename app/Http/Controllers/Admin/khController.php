<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\thongtinkh;
use App\Admin;
use DateTime;
use DB;
use App\nhomkh;
use App\donhang;
use App\lienhe;
use App\donvan;

class khController extends Controller
{
    public function getlistkh(){
    	$thongtin = thongtinkh::select('thongtinkhs.id','thongtinkhs.hoten','thongtinkhs.diachi','thongtinkhs.thanhpho','thongtinkhs.email','thongtinkhs.gioitinh','thongtinkhs.ngaysinh','nhomkhs.tennhom','thongtinkhs.sdt')->join('nhomkhs','nhomkhs.id','=','thongtinkhs.nhomkh_id')->get();
        //dd($thongtin);
    	return view('backend.danhsachkhachhang',compact('thongtin'));
    }
    public function getthemkh(){
    	$admin = Admin::get();
        $nhomkh = nhomkh::get();
    	return view('backend.themthongtinkh',compact('admin','nhomkh'));
    }
    public function postthemkh(Request $request){
    	$thongtin = new thongtinkh();
    	$thongtin->admin_id = $request->nv;
        $thongtin->nhomkh_id = $request->nk;
    	$thongtin->hoten = $request->ht;
    	$thongtin->gioitinh = $request->gt;
    	$thongtin->ngaysinh = $request->date;
    	$thongtin->sdt = $request->sdt;
    	$thongtin->facebook = $request->fb;
    	$thongtin->email = $request->email;
    	$thongtin->diachi = $request->dc;
    	$thongtin->thanhpho = $request->tp;
    	$thongtin->note = $request->note;
    	$thongtin->created_at = new DateTime();
    	$thongtin->save();
    	//dd($thongtin);
    	return redirect()->route('admin/khachhang/danhsachkhachhang');
    }
    public function getthongtinkh($id){
    	$thongtin = thongtinkh::join('admins','admins.id','=','thongtinkhs.admin_id')->where('thongtinkhs.id',$id)->get();
    	$thongtin1 = thongtinkh::where('id',$id)->get();

        $donhang = donhang::select('donhangs.madonhang','donhangs.status','donhangs.coc','donhangs.totalqty','donhangs.created_at','donhangs.updated_at')
        ->join('thongtinkhs','thongtinkhs.id','=','donhangs.thongtinkh_id')
        ->where('thongtinkhs.id',$id)->get();
        $giaohang = donhang::select('donhangs.madonhang','donvans.madonvan','donvans.status','donvans.note','donvans.created_at','donhangs.totalqty','nhavanchuyens.tennhavanchuyen')
        ->join('thongtinkhs','thongtinkhs.id','=','donhangs.thongtinkh_id')
        ->join('donvans','donvans.donhang_id','=','donhangs.id')
        ->join('nhavanchuyens','nhavanchuyens.id','=','donvans.nhavanchuyen_id')
        ->where('thongtinkhs.id',$id)->get();

        $congno = donhang::select('donhangs.madonhang','donvans.madonvan','donvans.status','donvans.note','donvans.created_at','donhangs.totalqty','donhangs.coc')
        ->join('thongtinkhs','thongtinkhs.id','=','donhangs.thongtinkh_id')
        ->join('donvans','donvans.donhang_id','=','donhangs.id')
        ->where('thongtinkhs.id',$id)->get();
    	return view('backend.chitietkh',compact('thongtin','thongtin1','donhang','giaohang','congno'));
    }
    public function geteditkhachang($id){
    	$admin = Admin::get();
        $nhomkh = nhomkh::get();
    	$thongtin = thongtinkh::where('id',$id)->get();
    	return view('backend.editthongtinkh',compact('admin','thongtin','nhomkh'));
    }
    public function posteditkhachang(Request $request,$id){


    	$thongtin = thongtinkh::find($id);
    	$thongtin->admin_id = $request->nv;
    	$thongtin->hoten = $request->ht;
        $thongtin->nhomkh_id = $request->nk;
    	$thongtin->gioitinh = $request->gt;
    	$thongtin->ngaysinh = $request->date;
    	$thongtin->sdt = $request->sdt;
    	$thongtin->facebook = $request->fb;
    	$thongtin->email = $request->email;
    	$thongtin->diachi = $request->dc;
    	$thongtin->thanhpho = $request->tp;
    	$thongtin->note = $request->note;
    	$thongtin->updated_at = new DateTime();
    	//dd($thongtin);
    	$thongtin->save();

    	return redirect()->route('admin/khachhang/thongtinchitiet',['id'=>$thongtin->id]);
    }
    public function getdeletekhachhang($id){
    	try{  
            DB::beginTransaction();
            
            $thongtinkh = thongtinkh::find($id);
           // dd($luulink);
            $thongtinkh->delete($id);
            DB::commit(); 

       
            return redirect()->route('admin/khachhang/danhsachkhachhang');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

      } 
    }
    public function getthemnhomkhachhang(){
        return view('backend.nhomkh');
    }
    public function postthemnhomkhachhang(Request $request){
        $nhomkh = new nhomkh();
        $nhomkh->manhom = $request->mn;
        $nhomkh->tennhom = $request->tn;
        $nhomkh->mota = $request->mota;
        $nhomkh->created_at = new DateTime();
        $nhomkh->save();

        return redirect()->route('admin/khachhang/danhsachnhomkhachhang');
    }
    public function getdanhsachnhomkhachhang(){
        $nhomkh = nhomkh::get();
        return view('backend.danhsachnhomkhachhang',compact('nhomkh'));
    }
    public function getdeletenhomkh($id){
        try{  
            DB::beginTransaction();
            
            $nhomkh = nhomkh::find($id);
           // dd($luulink);
            $nhomkh->delete($id);
            DB::commit(); 

       
            return redirect()->back();
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

        } 
    }
    public function gelistlienhe(){
        $lienhe = lienhe::get();

        return view('backend.listlienhe',compact('lienhe'));
    }
    public function getxulylienhe($id){
        $lienhe = lienhe::find($id);
        $lienhe->status = 'đã trả lời';
        $lienhe->save();
        return redirect()->back();
    }
}
