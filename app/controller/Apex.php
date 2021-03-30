<?php


namespace app\controller;
use app\model\apex_user;
use think\facade\View;

class Apex
{
    #用户端登录接口
public function index()
{
    $data = $_GET;
    $e = apex_user::withSearch(["name","password"],[
        'user' => $data['name'],
        'password' => $data['password']
    ])->find();
    $t=time();
    $time = date("Y-m-d H:i:s",$t);
    if (strtotime($e['create_time']) > strtotime($time))
    {
        return $e['create_time'];
    }
   else{
       return 'no';
   }
}
public function view()
{
    return View::fetch("apex/apex_user");
}
public function userdata()
{
    $res = apex_user::select();
    $count1 = count($res);
    $data = array(
        'code'=> "0",
        'msg' => '',
        'count' => $count1,
        'data' => $res
    );
    echo json_encode($data);
}
public function adduserxml()
{
    return View::fetch("apex/add_admin");
}
public function adduser()
{
    $t=time();
    $data = $_POST;
    $time = date("Y-m-d H:i:s",$t);
    $user = new apex_user();
    $user->save([
        'user' => $data['user'],
        'password' => $data['password'],
        'create_time' => $time
    ]);
    #return redirect('/index.php/adminuser');
}
}