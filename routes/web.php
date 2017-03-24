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




#Route::get('about','HomeTest@index');
Route::get('abou', function () {
   return 'Hello World abou';
});


Route::get('/testPost',function(){
    $csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/hello" method="POST">
            <input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});

Route::post('/hello',function(){
    return "Hello Laravel[POST]!";
});


Route::get('testCsrf',function(){
    $csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/testPost" method="POST">
          	<input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});

Route::post('testCsrf',function(){
    return 'Success!';
});



/*
Route::get('/hello/laravelacademy',['as'=>'academy',function(){
    return 'Hello LaravelAcademy！';
}]);

Route::get('/testNamedRoute',function(){
   #return route('academy');
    return redirect()->route('academy');
});

Route::get('/hello/laravelacademy/{id}',['as'=>'academy',function($id){
    return 'Hello LaravelAcademy '.$id.'！';
}]);

Route::get('/testNamedRoute',function(){
    return redirect()->route('academy',['id'=>1]);
});

*/

Route::group(['as' => 'admin::'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        //
    }]);
});


Route::get('/testNamedRoute',function(){
    return route('admin::dashboard');
});

#php artisan make:middleware TestMiddleware

Route::group(['middleware'=>'test'],function(){
    Route::get('/write/laravelacademy',function(){
        //使用Test中间件
    });
    Route::get('/update/laravelacademy',function(){
       //使用Test中间件
    });
});

Route::get('/age/refuse',['as'=>'refuse',function(){
    return "未成年人禁止入内！";
}]);