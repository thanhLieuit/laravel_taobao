<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';
 	protected $fillable = [
        'Name', 'Description', 
    ];

   

    public function permissions() 
    {
       return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }
    public function admin()
    {
        return $this->belongsToMany(Admin::class, 'role_admins');
    }
    
     public function hasAccess(array $name) : bool
    {
        foreach ($name as $name) {
            if ($this->hasname($name))
                return true;
        }
        return false;
    }

    private function hasname(string $name) : bool
    {
        return $this->Description[$name] ?? false;
    }
}
