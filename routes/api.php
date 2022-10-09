<?php

use App\Http\Controllers\Random;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

///* Principales verbos de http
//GET
//POST
//PUT
//PATCH
//DELETE
//*/
////Se usa para devolver informacion
//Route::get('test', function(){
//    return "Hola Gerardo";
//});
//
//
////Se usa para enviar informacion
//Route::post('user/{name}', function ($name) {
//    return "Hola ".$name;
//});
//
////Se utiliza para actualizar datos, para retocar todos los campos de un modelo
//Route::put('user/{name}', function ($name) {
//    return "Hola ". $name;
//});
//
//
////Se utiliza para actualizar datos, para actualizar parcialmente un modelo
//Route::patch('user/{name}', function ($name) {
//    return "Hola ". $name;
//});
//
//
////Se utiliza para borrar algun registro unico o multiple
//Route::delete('user/{id}', function ($id) {
//    return "Se ha borrado el usuario con el id " . $id;
//});
//

Route::get('/test/{n1}/{n2}', [Random::class, 'random']);

Route::get('/users', function(){
    $users = User::all();
    return response()->json([
        "users" => $users
    ], 200);
});

Route::post('/users', function(Request $request){
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
    $user->save();

    return response()->json(['user',200]);
});

Route::prefix('v2')->group(function(){

    Route::get('/users',function(){
        $users = User::select('name','email')->get();
        return response()->json(["users" => $users],200);
    });

    Route::post('/users', function(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json(["user" => $user], 200);
    });

});
