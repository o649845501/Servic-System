<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\admin_user as adminuser;
use app\model\repairPeople;
use think\facade\Cookie;
use  app\model\wx_user;
use think\facade\Session;
use think\facade\View;
use think\Request;

class Login
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return view('index/login');
    }
    public function check(\app\Request $request)
    {
        $data = $request->param();
        $user = $data['user'];
        $password = sha1($data['password']);

        $sqldata = adminuser::where(['user' => $user,'password' => $password])->findOrEmpty();
        if ($user[0]!= null)
        {
            cookie('user',$user);
            return redirect('/');
        }
    }
    //推出操作
    public function exit()
    {
        Cookie::delete('user');
            return redirect('/');
    }
    //维修师傅小程序登录验证
    public function wxlogin()
    {
    $data = $_POST;
        $user = $data['user'];
        $password = sha1($data['password']);
        $sqldata = repairPeople::where(['user' => $user,'password' => $password])->find();
        if ($sqldata != null)
        {
           echo '1';
        }
        else
        {
            echo '2';
        }
    }
    public function studentlogin()
    {
        //小程序appid
        $appid = "wx7349bf3fce38f457";

        //配置appscret

        $secret = "4c89d4763104c78592e03453f10ba60f";
        //login请求返回的code
        $code = $_GET['code'];
        $api = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        //get请求设置
        function httpGet($url){
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  // 跳过检查
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            $res = curl_exec($curl);
            curl_close($curl);
            return $res;
        }
        //进行请求
        $str = httpGet($api);
        $jsonstr = json_decode($str,true);
        //echo $jsonstr['openid'];
        //数据库写入openid
        $wx_user = new wx_user;
        $ispect_openid = wx_user::where('openid',$jsonstr['openid'])->find();
        if ($ispect_openid == null) {
            $wx_user->openid = $jsonstr['openid'];
            $wx_user->save();
        }
        return $jsonstr['openid'];
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
