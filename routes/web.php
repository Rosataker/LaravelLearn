<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
	#view 是一個faction, laravel 用來導引 resources\views 裡面*.blade.php用的
    return view('welcome');
});



#取用app/Http/Controllers/HomeController.php 裡的public function
//Route::get('/','HomeController@index');

#Route::get('about','HomeController@index');
Route::get('abou', function () {
   return 'Hello World abou';
});

Route::get('ggg', function () {
   return 'Hello World ggggggggg';
});



/*
Route::get('about', function () {
    return view('welcome');
});
*/
/*
Route::post('foo/bar', function()
{
    return 'Hello World';
});
*/

#php artisan make:controller HomeController 
#利用artisan直接建立到app/Http/Controllers/