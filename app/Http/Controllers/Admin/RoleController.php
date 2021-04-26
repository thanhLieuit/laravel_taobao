<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\Admin;
use App\Permission;
use DB;
class RoleController extends Controller
{	
	private $admin;
    private $roles;
    private $permissions;
    public function __construct(Admin $admin, Role $roles, Permission $permissions)
    {
       // $this->middleware('auth');
        $this->admin = $admin;
        $this->roles = $roles;
        $this->permissions = $permissions;
    }
     public function getlistrole () {
    
    	$listr = $this->roles->all();
    	return view('backend.listrole', compact('listr'));
    }

    public function getaddrole () {
    	$permissions = $this->permissions->all();
    	return view('backend.addrole', compact('permissions'));
    }

    public function postaddrole (Request $request ) {
    
    	try{
            DB::beginTransaction();
            $roleCreate = $this->roles->create([
                'Name' => $request->name,
                'Description' => $request->description
            ]);
          
          //  $roleCreate = $this->permission->all();
         $roleCreate->permissions()->attach($request->permission);
          
            DB::commit();
           return redirect()->route('admin/user/listrole');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
}
public function geteditrole ($id) {
        $permissions = $this->permissions->all();
        $role = $this->roles->findOrFail($id);
        $getAllPermissionOfRole = DB::table('role_permission')->where('role_id', $id)
        ->pluck('permission_id');
      
        return view('backend.editrole', compact('permissions', 'role', 'getAllPermissionOfRole'));
    }

    public function posteditrole (Request $request,$id) {
        try{
            DB::beginTransaction();
            //update to role table
            $this->roles->where('id',$id)->update([
                'Name' => $request->name,
                'Description' => $request->description
            ]);
            //update role_permission
            DB::table('role_permission')->where('role_id',$id)->delete();
            $roleCreate = $this->roles->find($id);
        //    dd($roleCreate);
            $roleCreate->permissions()->attach($request->permission);
            DB::commit();
           return redirect()->route('admin/user/listrole');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
    }
    public function getdeleterole ($id) {
        try{
             DB::beginTransaction();
             //Delete Role
             $role = $this->roles->find($id);
             $role->delete($id);
             //Delete role_permission
             $role->permissions()->detach();
             DB::commit();
            return redirect()->route('admin/user/listrole');
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());
        }
    }
    public function getaddpremission()
    {
        return view('backend.addpermission');
    }
    public function postaddpremission(Request $request)
    {
        try{
            DB::beginTransaction();
            $permissionCreate = $this->permissions->create([
                'Name' => $request->name,
                'Description' => $request->description
            ]);    
            DB::commit();
           return redirect()->route('admin/user/addpremission');

   }catch(\Exception $exception){
    DB::rollback();
    \Log::error('loi:'.$exception->getMessage().$exception->getLine());
   } 
    }
}
