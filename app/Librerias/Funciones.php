<?php
namespace App\Librerias;
use App\User;

class Funciones{
	public function info()
    {    	   	
        return 'Funciona';
    }
	
    public function user($id)
    {    	   	
        $user=User::find($id);
        return $user;
    }


}
?>