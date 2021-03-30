<?php


namespace app\controller;
use app\model\servic;
use think\db\Where;
use app\model\wx_user;
use think\facade\Db;

class myservic
{
    public function index()
    {
        $openid = $_GET;
        $wx_user = wx_user::Where('openid',$openid['openid'])->find();
        $servicdb = Db::table('servic')->where('wx_user_id',$wx_user['Id'])->select();
        echo json_encode($servicdb);
    }
}