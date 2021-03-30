<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\model\admin_user as adminuser;
use app\model\servic;

class update
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }
//管理员修改方法
    public function upadmin()
    {
        $data = $_POST;
        //多维数组转关联数组
        $user = adminuser::find($data['data']['Id']);
        $user->name = $data['data']['name'];
        $user->user = $data['data']['user'];
        $user->status = $data['data']['status'];
        $user->gender = $data['data']['gender'];
        $str = $user->save();

        if ($str == true)
        {
            echo '修改成功';
        }
        else
        {
            echo '修改失败';
        }
    }
    public function upservic()
    {
        $data = $_POST;
        $user = servic::find($data['data']['Id']);
        $user->dorm_id = $data['data']['dorm_id'];
        $str = $user->save();
        if ($str == true)
        {
            echo "修改成功";
        }
        else
        {
            echo '修改失败';
        }
    }
    public function upadminstatus()
    {
        $data = $_POST;
        //多维数组转关联数组
        $user = adminuser::find($data['data']['Id']);
        $upstatus0 = '<span class="layui-badge">已停用</span>';
        $upstatus1 = '<span class="layui-badge">已启用</span>';
       if ($user['status']  == $upstatus0)
       {
           $user->status = $upstatus1;
           $user->save();
           echo $upstatus1;
       }
       else
       {
           $user->status = $upstatus0;
           $user->save();
          echo $upstatus0;

       }
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
