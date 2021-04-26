<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Role;
use Auth;
use DateTime;
use DB;
use Hash;
use Carbon\Carbon;


class UserAdminController extends Controller
{

	  private $admin;
    private $roles;
    public function __construct(Admin $admin, Role $roles)
    {
       // $this->middleware('auth');
        $this->admin = $admin;
        $this->roles = $roles;

    }
    public function getadduser()
    {
    	return view('backend.adduser');
    }

    public function postadduser(Request $request)
    {
      try{
      DB::beginTransaction();
      $adminCreate = $this->admin->create([
        'name' => $request->name,
        'email'=>$request->email,
        'password'=> bcrypt($request['password']),
      ]);
     // dd($adminCreate);
      // $user = User::max('id');
      
      //   $nhanvien = new Nhanvien();
      //   $nhanvien->user_id = $user;
      //   $nhanvien->save();
        DB::commit();
        return redirect()->route('admin/user/listuser');

       }catch(\Exception $exception){
      DB::rollback();
     }
    }

    public function getListInfo(){
       
        
      $list= $this->admin->all();
      return view('backend.listuser',compact('list'));
    }
    public function geteditinfo ($id) {
     
        $roles = $this->roles->all();
        $admin = $this->admin->findOrfail($id);
        $listroleofuser = DB::table('role_admins')->where('Admin_id', $id)->pluck('Role_id');
        
       return view('backend.editinfo',compact('roles', 'admin','listroleofuser'));
     }
     public function posteditinfo (Request $request , $id) {
  
      try{
      DB::beginTransaction();
      $this->admin->where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email
      ]);
      DB::table('role_admins')->where('Admin_id', $id)->delete();
      $adminCreate = $this->admin->find($id);
      $adminCreate->roles()->attach($request->role);
       DB::commit();
        return redirect()->route('admin/user/listuser');
      }catch(\Exception $exception){
      DB::rollback();
     }
     }


     public function getdeleteinfo($id){
         
        try{
        DB::beginTransaction();

              $admin = $this->admin->find($id);
              $admin->delete($id);
              $admin->roles()->detach();
           
         DB::commit();
        return redirect()->back();

     }catch(\Exception $exception){
      DB::rollback();
      \Log::error('loi:'.$exception->getMessage().$exception->getLine());
     }

      }

    public function getthongke()
    {
      $dt = Carbon::now()->toDateString();

      $tthomnay = Order::where('ngaydat',$dt)->sum('total');
      $slhomnay = Order::where('ngaydat',$dt)->count();
      $order1 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->where('ngaydat',$dt)->get();

      $ngayhomqua = Carbon::now()->subDay()->toDateString();
      $tthomqua = Order::where('ngaydat',$ngayhomqua)->sum('total');
      $slhomqua = Order::where('ngaydat',$ngayhomqua)->count();
      $order2 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->where('ngaydat',$ngayhomqua)->get();


      $bayngay = Carbon::now()->subDay(7)->toDateString();
      $ttbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->count();
      $slbayngays = Order::whereBetween('ngaydat', array($bayngay, $dt))->sum('total');
       $order3 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->whereBetween('ngaydat', array($bayngay, $dt))->get();
     
      $thang = Carbon::now()->month()->toDateString();
      $ttthang = Order::whereBetween('ngaydat', array($thang, $dt))->count();
      $slthang = Order::whereBetween('ngaydat', array($thang, $dt))->sum('total');
       $order5 = Order::select('customers.name','customers.phone','orders.id')->join('customers', 'orders.id_c', '=', 'customers.id')->whereBetween('ngaydat', array($thang, $dt))->get();
      $ttthu = Order::sum('total');

      $orderc = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->count();
      $orders = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->sum('total');
      $order4 = Order::select('customers.name','customers.phone','customers.address','orders.total','orders.Note','orders.pay','orders.id','orders.xacnhan')
        ->join('customers', 'orders.id_c', '=', 'customers.id')->where('orders.xacnhan','dahoanthanh')->whereBetween('ngaydat', array($bayngay, $dt))->get();
      



      return view('admin.chucnang.thongke',compact('tthomnay','slhomnay','tthomqua','slhomqua','ttbayngays','slbayngays','ttthu','orderc','orders','order1','order2','order3','order4','ttthang','slthang','order5'));


    }

    public function getlienhe(){
      $lienhe = Lienhe::select('*')->get();
      return view('admin.chucnang.lienhe',compact('lienhe'));
    }
    
    public function getlienheupdate($id){
      $lienhe = Lienhe::find($id);
      $lienhe->tinhtrang = 'daduyet';
    
      $lienhe->id_u = Auth::user()->id;
        $lienhe->updated_at = new DateTime();
      $lienhe->save();
      return redirect()->back();
    }
}
