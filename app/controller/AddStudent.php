<?php
declare (strict_types = 1);

namespace app\controller;
use app\model\servic as tjstudent;
use app\model\wx_user;
use think\helper\Arr;
use think\Request;

class AddStudent
{
    /**
     * 显示资源列表
     *
     * @return String
     */
    //获取小程序学生上报信息，写入数据库
    public function index()
    {
        //获取数据
        $wxuserid = '';
        $res = $_POST;
        $phonennumber = $res['number'];
        $openid = $res['openid'];
        //查询数据库是否存在用户oppenid
        $wxuser = wx_user::where('openid',$openid)->find();
        if ($wxuser != null)
        {
            $wxuserid = $wxuser['Id'];
        }
        else
        {
            $wxuser = new wx_user;
            $wxuser->openid = $openid;
            $wxuser->phonennumber = $phonennumber;
            $wxuser->save();
            $wxuserid = wx_user::where('openid',$openid)->find()['Id'];
        }

        //写入报修信息
        $res['wx_user_id'] = $wxuserid;
        $err = tjstudent::create($res);
        if ($err)
        {
           $arr = '1';
        }
        else
        {
            $arr = '0';
        }
        $data = $arr;
        echo $data;
    }


}
