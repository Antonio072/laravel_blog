<?php

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get("users",function ()
    {return  "Usuarios";});
    Route::get("products",function ()
    {return  "Productos";});

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