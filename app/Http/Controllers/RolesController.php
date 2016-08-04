<?php

namespace App\Http\Controllers;
use App\User;
//use App\Role;
use View;
use App\Permiso;
use Bican\Roles\Models\Role;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
	
    public function getIndex()	
    {
        $roles = Role::all();
		return View::make('rol.index_rol')->with('roles',$roles);		
    }

    public function getCreate()
    {		
        return View::make('rol.crear_rol');		
    }
    
    public function postStore(Request $request)
    {        
		$rol = new Role();
		$rol->name=$request->name;
		$rol->description = $request->descripcion;
		$rol->level = $request->idnivel;
		$rol->save();
		return redirect('/roles');
    }

    
    public function getShow($id)
    {
        
		
    }

    
    public function getEdit($id)
    {
		$rol = Role::find($id);
		$permisos = Permiso::all();
        return View::make('rol.editar_rol')->with('rol',$rol)->with('permisos',$permisos);
		//dd($rol);
    }
    
    public function postUpdate(Request $request, $id)
    {      
	   $rol = Role::find($id);
	   $rol->name = $request->nombres;
	   $borrar_permisos=$request->borra_permisos;
	  
	   if($borrar_permisos>0){		   
		   foreach ( $borrar_permisos as $idpermiso){
			   $rol->detachPermission($idpermiso);		  
		   }
	   }
	   
	   if($request->idpermiso>0) {		
			$rol->attachPermission($request->idpermiso);
		}
		$rol->save();
		//return redirect('roles/edit/'.$id);
		return redirect('/roles');
	  
    }

    public function getDestroy($id)
    {
        //
    }
	
	
	public function postPermisos(Request $request){
		$rol = Role::find($request->idrol);
		//$permiso = Permiso::($request->idPer);
		$rol->attachPermission($request->idPer);
		
		
	}
}
