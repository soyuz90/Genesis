<?php
use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //return view('welcome');
	return Redirect::to('auth/login');
});

Route::get('home', 'HomeController@index');
//Route::pattern('roles', '[0-9]+');//definiendo patrones
Route::controller('admin','AdminController');
Route::controller('roles','RolesController');
Route::controller('usuarios','Usercontroller');
Route::controller('permisos','PermisosController');


/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);*/


Route::get('/prueba1', function () {    
   $user = Auth::loginUsingId(111111);
   if ($user->is('admin')) {
      return 'si tiene el rol';
    }else{
    	return 'No Tiene el rol';
    }
});



Route::get('/prueba2', function () {    
   $user = Auth::loginUsingId(111111);
   if ($user->can('borrar.rol')) {
      return 'si puede';
    }else{
    	return 'No no puede';
    }
});




// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


// Password reset link request routes...
Route::get('password/email', ['as' => 'password/email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', ['as' => 'password/postEmail', 'uses' => 'Auth\PasswordController@postEmail']);

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'password/postReset', 'uses' =>  'Auth\PasswordController@postReset']);