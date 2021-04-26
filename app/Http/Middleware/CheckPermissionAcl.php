<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App\Permission;


class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null)
    {
        //lấy thông tin Role
        $listRoleOfUser = DB::table('admins')
         ->join('role_admins', 'admins.id', '=', 'role_admins.Admin_id')
         ->join('roles', 'roles.id', '=', 'role_admins.Role_id')->where('admins.id', auth()->id())
         ->select('roles.*')->get()->pluck('id')->toArray();
        // $listRoleOfUser = User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toarray();

        //lấy các quyền khi login vào hệ thống
          $listRoleOfUser = DB::table('roles')
         ->join('role_permission', 'roles.id', '=', 'role_permission.role_id')
         ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
         ->whereIn('roles.id', $listRoleOfUser)
         ->select('permissions.*')->get()->pluck('id')->unique();
         
         //lấy ra màn hình tương ứng
         $checkPermission = Permission::where('Name', $permission)->value('id');
         //kiểm trả user có quyền vào màn hình không

         if( $listRoleOfUser->contains($checkPermission) ){
            return $next($request);
         }
            return redirect()->back();
    }
}
