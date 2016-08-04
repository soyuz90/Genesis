<?php
namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{  
	protected $table = 'roles';
	
   public function users()
    {
        return $this->belongsToMany('App\User');
	}
	
	public function permisos()
    {
        return $this->belongsToMany('App\Permiso');
    }
	
	
	public function permisos2()
	{		
		return $roles = DB::table('roles')->where('roles.id','=',$this->id)
		 ->select('permissions.id','permissions.name')
         ->join('permission_role', 'roles.id', '=', 'permission_role.role_id')
		 ->join('permissions','permission_role.permission_id','=','permissions.id')
         ->get();
	}
}
