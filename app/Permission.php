<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
     //
     protected $table = 'permissions';
     protected $fillable = [
        'Name', 'Description', 
    ];
  public function roles()
    {
        return $this->belongsToMany('App\Role','role_permission','role_id','permission_id');
    }

   
}
