<?php

namespace App\Http\Controllers;
use Bican\Roles\Models\Role;
use App\User;
use App\Permiso;
//use App\Role;
use View;
use DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
   
    public function getIndex()
    {
        $user=User::find(1);
		$roles = $user->Roles2();
		$permisos = $user->permisos();
		dd($permisos);
    }

    public function getCreate()
    {        
		return View::make('usuario.crear_usuario');
    }

    public function postStore(Request $request)
    {
        $usuario = new User();
		$usuario->id=$request->id;
		$usuario->name = $request->nombres;
		$usuario->email = $request->email;
		$usuario->password = \Crypt::encrypt($request->password);
		$usuario->save();
		return redirect('admin');
		
    }
    
    public function getShow($id)
    {
        //
    }
    
    public function getEdit($id)
    {
		$usuario = User::find($id);			
		$roles = Role::all();
		$permisos = Permiso::all();
        return View::make('usuario.editar_usuario')->with('usuario',$usuario)->with('roles',$roles)->with('permisos',$permisos);
    }
    
    public function postUpdate(Request $request, $id)	
    {       
	   $usuario = User::find($id);
	   $usuario->name = $request->nombres;
	   $usuario->email = $request->email;
	   
	   $roles = $request->rol;
	   $permisos = $request->permisos;
	   $idpermisos = $request->borrar_permisos_user;
	   
	   if(count($roles)>0){
			foreach ($roles as $rol){
			  $usuario->detachRole($rol);
			}
	    }
		
		if(count($permisos)>0){
			foreach ($permisos as $permiso){
				$permi = Permiso::find($permiso);
				$usuario->detachPermission($permi);				
			}
		}

		if(count($idpermisos)>0){
			foreach ($idpermisos as $idpermiso){
			$usuario->detachPermission($idpermiso);
			}
		}
	   
	   
	    if($request->idrol>0){
			$usuario->attachRole($request->idrol);
		}
		
		if($request->idpermiso>0){
			$usuario->attachPermission($request->idpermiso);
		}
	    
		$usuario->save();
		return redirect('admin');
    }
  
    public function getDestroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();       
		return redirect('admin');
    }
}
