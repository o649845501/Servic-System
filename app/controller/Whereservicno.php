<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\servic as selectstudent;
use think\facade\View;
use think\Request;

class Whereservicno
{
    /**
     * 显示资源列表
     *
     * @return string
     */
    public function index()
    {
        return View::fetch('studentdata/servic_no');
    }

    public  function whereno()
    {
        $res = selectstudent::where('status','0')->select();
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
