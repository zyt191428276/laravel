<?php

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

//Event::listen('illuminate.query', function ($query){
//   var_dump($query);
//});

Route::get('/', function () {
    return view('welcome');

//    echo "123";
});

Route::get('/test', function () {
    echo "test";
});

Route::get('/admin/user', function () {
    echo "admin";
});


Route::post('/insert', function () {
    echo "这是post";
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/put', function () {
    return view('put');
});

Route::delete('/del', function () {
    echo 'delete complete';
});

Route::get('/delete', function () {
    return view('delete');
});

//路由组
Route::group([], function () {
});

Route::get('/article/{id}', function ($id) {
//    echo '这是文章的详情';
    echo '这是当前查询的id' . $id;
});

//限制参数的类型
Route::get('/goods/{id}', function ($id) {
    echo '商品的详情。。。当前id为' . $id;
})->where('id', '\d+');

//多个参数
Route::get('/{type}-{id}', function ($type, $id) {
    echo '当前的类型是-' . $type . 'id为' . $id;
});

//路由别名
Route::get('/Admin/User/index', [
    'as' => 'ulist',
    'uses' => function () {
        echo route('ulist'); //route是一个函数 通过路由别名来快速创建完整url
    }
]);

Route::get('/404', function () {
    abort(404);
});

Route::get('/setting', [
    'middleware' => ['log', 'login'],
    'uses' => function () {
        echo '这是setting';
    }
]);

Route::get("/admin", function () {
    echo '这是一个后台首页。。。';
})->middleware(['log', 'login']); //多个中间件

Route::get('/login', function () {
    echo '这是一个登陆页面';
});

Route::get('/session', function () {
   session(['uid'=>10]);
//    \Session::put('username', 'lala');
    dd(\Session::all());
});

Route::get('/session2',function (){
    dd(\Session::all());
});

Route::get('/session3',function (){
   \Session::pull('uid');
});


//php artisan make:middleware LoginMiddleWare 生成一个中间件
//php artisan make:controller LoginController 生成一个控制器
//php artisan make:controller LoginController --plain  生成一个纯净控制器

//当用户请求服务器上的UserController路径时，会执行UserController
Route::get('/controller', 'UserController@show');

Route::get('/user/edit/{id}', 'UserController@edit');

Route::get('/admin/user/delete/{id}', [
    'as' => 'udelete',
    'uses' => 'UserController@delete',
]);

Route::get('/user/shengji', [
    'middleware' => 'login',
    'uses' => 'UserController@shengji',
]);

Route::get('/user/jinyong', 'UserController@jinyong')->middleware('login');

//隐式控制器 如果是goods开头的路径都是交给GoodsController
//controller中的方法名需要以请求方式+名称 命名 比如 getAdd postInsert
Route::controller('goods', 'GoodsController');

//Restful控制器路由规则
Route::resource('article', 'ArticleController');

Route::get('/request', 'UserController@qingqiu');

Route::get('/file', 'UserController@show');

Route::post('/upload', 'UserController@upload');

Route::get('/cookie', 'UserController@cookie');

Route::get('/flash', 'UserController@flash');

Route::post('/flash', 'UserController@doflash');

Route::get('/response', 'UserController@response');

Route::get('/view', 'UserController@view');

Route::get('/blade', 'UserController@blade');

Route::get('/page', 'UserController@page');

Route::get('/layout', 'UserController@layout');

//模版继承
Route::get('/extend', 'UserController@extend');

Route::get('/liucheng', 'UserController@liucheng');

Route::get('/xunhuan', 'UserController@xunhuan');

//数据库操作
Route::get('/db', 'UserController@db');

Route::get('/builder', 'UserController@builder');

/*
 * linux下部署 需要给storage和vendor相应的读写权限
 * */

Route::get('/test',function (){
   $user = new \App\User();
   return $user->test();
});


Route::get('/valida','UserController@valida');

Route::get('/hash','UserController@HashEn');

Route::get('/imgTest', function (){
   return View('test')->with('img','/upload/liuyan.jpg');
});


