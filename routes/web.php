<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
    Ruta normal
*/

Route::get("/users",function ()
{
    return  "Nombre";
});

/*
    Ruta con parametro
*/
Route::get("/name/{name}",function ($name)
{return  "Hola " . $name;});

/*
    Ruta con parametro opcional y atributo de variable por defecto
*/
Route::get("surname/{name?}",function ($name = "usuario")
{return  "Hola " . $name;
})
//Podemos hacer match con expresiones regulares para controlar 
//los parametros de la rutas
->where('name','[A-Za-z]+');

/*
    Ruta agrupada con prefijo
*/
Route::group(["prefix" => 'admin/'],function ($name = "usuario")
{
    Route::get("/",function ()
    {return  view("admin.admin");})->name("admin-home");

    Route::get("users",function ()
    {return  view("admin.users");})->name("admin-users");
    
    Route::get("products",function ()
    {return  view("admin.products");})->name("admin-products");

});

/*
    Ruta que acepta todos los verbos, GET, PUT, POST, DELETE etc
*/

Route::any("/any", function(){
    return "any";
}
);

/*
    Ruta que acepta los verbos que esten permitidos
*/

Route::match(['get','post'],'/match',function(){
    return "Matched route";
});

/*
    Ruta que redirecciona
*/

Route::redirect('/match','/redirected');
Route::get('/redirected',function(){
    return "Redirigido";
});

/*
    Ruta con nombre
        uso: Hay que utilizar un helper
            ej: href="{{ route('nombreDeLaRuta") }}"
*/

Route::get("/namedRoute",function(){
    return "Esta ruta esta nombrada";
})->name("named");

//Nota: podemos regresar respuesta con los helpers 
//    return response()->json(['foo' => 'bar', 'a'=>['aa'=>'bb']], 200);
// regresa un JSON con {"foo":"bar"}

/*
 ******************* Vistas ******************
*/

//Ejemplo de ruta que carga una vista
Route::get("/views",function(){
    return view("view");
});

//Ejemplo de ruta que carga una vista con parametro
Route::get("/views-param",function(){
    $param = "Parametro";
    $records = [1,2,3,4,5,6,7];
    //  Forma de parametros individuales
        // return view("view")->with("param" , $param);
    //  Forma "compacta", en este caso se pasa un string y un arreglo
    return view("view",compact("param","records"));
});

// Ruta con vista dentro de carpetas
Route::get("/admin/profile",function(){
    return view("admin.profile");
})->name("admin-profile");

// Ruta a vue

Route::view('/vue','vue')->name("vue");

// Ruta para ver si hay conexion con la bd
Route::get('/database',function(){
    try {
        DB::connection()->getPdo();
    } catch (\Exception $e) {
        die("No se pudo conectar a la base de datos: " .$e);
    }
    return "database";
})->name('database');

// Ruta para obtener a todos los usuarios
Route::get('/allUsers', function(){
    $user = App\User::with(['posts' => function($query){
        $query->where('id',183);
    }])->where('id',1)->get();
//    dd(App\User::with('posts')->first()->posts->first()->id);

   return $user;
});

/**
 * Ruta de posts
 */

Route::prefix('posts')->name('posts.')
->middleware(['verified'])
    ->group(function(){
    Route::view('/','posts.posts');
    Route::view('/create','posts.create')->name('create');
    Route::get('/{id}/edit','PostController@edit')->name('edit');
 });

 /**
  * Rutas de comentarios
  */
  
  Route::prefix('comments')->name('comment.')
    ->group(function(){
    Route::view('/','comments.comments');
    Route::view('/create','comments.create')->name('create');
    Route::get('/{id}/edit','CommentController@edit')->name('edit');
 });
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')
    ->name('users.')
    ->group(function(){
    Route::get('/{user}','UserController@profile')->name('profile');
    Route::get('/{user}/posts','UserController@userPosts')->name('posts');
    // Route::get('/{id}/edit','CommentController@edit')->name('edit');
 });
