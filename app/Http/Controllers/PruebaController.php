<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Librerias\Funciones;
use App\User;

class PruebaController extends Controller
{
    
    public function getMensaje()
    {
        $funciones = new Funciones();
        $primero = $funciones->info();
        return $primero;
    }

    public function getUsuario($id){
       $funciones = new Funciones();
       $datos = $funciones->user($id);
       return 'El usuario: '.$datos->name.' Correo: '.$datos->email;
        
    }

    public function getFormu(){
        return View('formulario');
    }

   public function putActualizar(Request $request){
     $nombre =  $request->nombre;
     $correo =  $request->correo;
     return 'Nombre: '.$nombre.' Correo: '.$correo;
   }
   
    
}
