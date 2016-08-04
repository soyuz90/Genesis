<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Permiso;
use View;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermisosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
	
    public function getIndex()
    {
		
		$permisos = Permiso::all();
		return View::make('permiso.index_permiso')->with('permisos',$permisos);	
    }

    
    public function getCreate()
    {
        return View::make('permiso.crear_permiso');
    }

    
    public function postStore(Request $request)
    {        
		$permiso = new Permiso();
		$permiso->name = $request->nombre;
		$permiso->description = $request->descripcion;
		$permiso->save();
		return redirect('/permisos');		
		
    }

   
    public function getShow($id)
    {
        //
    }

   
    public function getEdit($id)
    {
        //
    }

    
    public function postUpdate(Request $request, $id)
    {
        //
    }

    
    public function getDestroy($id)
    {
        $permiso = Permiso::find($id);
        $permiso->delete();       
		return redirect('/permisos');
    }
}
