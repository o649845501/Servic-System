<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

Route::get('think', function () {
    return 'hello,ThinkPHP6!';
});


//路由组
Route::group(function (){
    //用户模块路由
    Route::get('hello/:name', 'index/hello');
    Route::resource('index','index');
    Route::resource('glyuser','adminuser');
    Route::resource('addglyuser','adduser');
    Route::resource('allservic','Creatstudent');
    Route::resource('noservic','Whereservicno');
    Route::resource('yesservic','Whereservicyes');
    Route::resource('servicuser','Servic');
    Route::rule('disservic','Whereservicyes/dd');
    //Route::rule('Echarts','Echart/index');
    Route::rule('wait','Wait/index');
    Route::rule('reference','Wait/reference');
    Route::rule('yeswait','Wait/yeswait');
    Route::rule('addservic','Servic/addservic');
    Route::rule('servicthan','Echarts/servicthan');
    Route::rule('Apex123','Apex/view');
    Route::rule('Apexuser','Apex/userdata');
    Route::rule('adduser','Apex/adduser');
    Route::rule('adduserxml','Apex/adduserxml');

})->middleware(function ($request , Closure $next)
{
    if (!cookie('?user'))
    {
        return redirect('/index.php/login');
    }
    return $next($request);
});
Route::resource('login','login');