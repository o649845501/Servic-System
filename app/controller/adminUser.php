<?php


namespace app\controller;

use app\model\admin_user;
use app\model\admin_user as adminusermodel;
use think\exception\ValidateException;
use think\facade\View;
use think\Request;

class adminuser
{
    /**
     * 显示资源列表
     *
     * @return string
     */
    //管理员账号管理页面
    public function index()
    {
     return View::fetch('user/admin_user',[
        'list' => adminusermodel::select(),
     ]);
    }
    public function adduser()
    {
        return View::fetch('user/add_admin');
    }
    //layui管理员数据表格数据接口
    public  function table()
    {
      /*while ($res=adminusermodel::select())
        {
            $arr[] = $res;
        }*/
        $res = adminusermodel::select();
        $count1 = count($res);
        $data = array(
            'code'=> "0"
            ,'msg' => '',
            'count' => $count1,
            'data' => $res
        );
        echo json_encode($data);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {

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