<?php


namespace app\controller;


use think\facade\View;
use think\Request;
use app\model\servic;
class Wait
{

public function index()
{
$id = $_GET;
return View::fetch('disservic/wait',['id' => $id['id']]);
}
public  function  reference()
{
$id = $_GET;
$res = servic::where('Id',$id['id'])->select();
$count1 = count($res);
$data = array(
        'code'=> "0",
        'msg' => '',
        'count' => $count1,
        'data' => $res
    );
echo json_encode($data);
}
}