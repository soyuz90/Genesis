<?php
namespace App;
use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Model implements AuthenticatableContract, 									
									CanResetPasswordContract,
									HasRoleAndPermissionContract
{
    use Authenticatable, CanResetPassword,HasRoleAndPermission;
    
    protected $table = 'users';	
	public $timestamps = true;
    protected $fillable = ['name', 'email', 'password'];
    
    protected $hidden = ['password', 'remember_token'];
	
	public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
	
	/**
     * Funcion para determinar los roles que tiene asignados el usuario.  
     */
	public function roles2(){		
		return $roles = DB::table('users')->where('users.id','=',$this->id)
		 ->select('roles.name','roles.id')
         ->join('role_user', 'users.id', '=', 'role_user.user_id')
		 ->join('roles','role_user.role_id','=','roles.id')
         ->get();
	}
	
	/**
     * Funcion para determinar los permisos que tiene  
	 * el usuario asignados a su rol. 
     */
	
	public function permisosRol(){
		return $roles = DB::table('users')->where('users.id','=',$this->id)
		 ->select('permissions.name','permissions.id')
         ->join('role_user', 'users.id', '=', 'role_user.user_id')
		 ->join('roles','role_user.role_id','=','roles.id')//
		 ->join('permission_role','roles.id','=','permission_role.role_id')
		 ->join('permissions','permission_role.permission_id','=','permissions.id')	
         ->get();
	}
	
	public function permisosUsuario(){		
		return $roles = DB::table('users')->where('users.id','=',$this->id)
		 ->select('permissions.id','permissions.name')
         ->join('permission_user', 'users.id', '=', 'permission_user.user_id')
		 ->join('permissions','permission_id','=','permissions.id')
         ->get();
	}
	
	
	
}
