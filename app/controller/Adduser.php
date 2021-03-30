<?php


namespace app\controller;

use app\model\admin_user;
use app\model\admin_user as adminusermodel;
use think\exception\ValidateException;
use think\facade\View;
use think\Request;

class adduser
{
    /**
     * 显示资源列表
     *
     * @return string
     */
    public function index()
    {
        return View::fetch('user/add_admin');
    }
    public function adduser()
    {

    }
    //layui管理员数据表格数据接口
    public  function table()
    {

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
        //获取所有添加管理员表单数据
        $data = $request->param();
        //密码加密
        $data['password'] = sha1($data['password']);
        $erro = adminusermodel::create($data);
        return redirect('/index.php/adminuser');
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