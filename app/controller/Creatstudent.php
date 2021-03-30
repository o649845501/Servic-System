<?php
declare (strict_types = 1);

namespace app\controller;

use think\Request;
use think\facade\View;
use app\model\servic as selectstudent;
class Creatstudent
{
    /**
     * 显示资源列表
     *
     * @return string
     */
    //返回学生报修信息表格页面
    public function index()
    {
        return View::fetch('studentdata/servic_all');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    //查询报修信息并进行符合layui的数据格式转换
    public function create()
    {
        $res = selectstudent::select();
        //获取数据条数
        $count1 = count($res);
        $data = array(
            'code'=> "0",
            'msg' => '',
            'count' => $count1,
            'data' => $res
        );
        echo json_encode($data);

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
