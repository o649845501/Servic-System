<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use app\model\admin_user as adminuser;
use app\model\servic as delservic;
class delate
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $data = $_POST;
         echo $data;
    }
public function deladmin()
{
    //接收ajax数据
    $id = $_POST['str']['Id'];
    //查询
    $delate = adminuser::find($id);
    //删除
    $delate->delete();
    if (adminuser::find($id) == Null)
    {
        echo 200;
    }
    else
    {
        echo 500;
    }
}
public function delservic()
{
$id = $_POST['str']['Id'];
$delate = delservic::find($id);
$delate->delete();
    if (delservic::find($id) == Null)
    {
        echo 200;
    }
    else
    {
        echo 500;
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
