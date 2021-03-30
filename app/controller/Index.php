<?php
namespace app\controller;

use think\facade\View;

class Index
{
    public function index()
    {
        if(!cookie('?user')) {
            return View::fetch('index/login');
        }
        else
        {
            $user = cookie('user');
            return View::fetch('index',[
               'name' => $user,

            ]);
        }
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }
     public function test()
     {
         return View::fetch('delate');
     }
}
