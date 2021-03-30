<?php
declare (strict_types = 1);

namespace app\controller;

use app\model\servic as selectstudent;
use app\model\repairPeople as repairpeople;
use think\facade\View;
use think\Request;

class Whereservicyes
{
    /**
     * 显示资源列表
     *
     * @return String
     */
    public function index()
    {
        return View::fetch('studentdata/servic_yes');
    }
public function dd()
{
    return View::fetch('disservic/servic_wait');
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
    //返回状态为1的报修信息
    public function whereyes()
    {
//        $res = selectstudent::where('status','1')->select();
//        $wxyuser = j$res;
//        $user = repairpeople::where('user',$wxyuser)->find();
//        $res->wxyuser = $user->name;
//        $count1 = count($res);
        $res = selectstudent::with('RepairPeople')->select();//查询数据
        $count1 = count($res);
        foreach ($res as $obj)
        {
           foreach ($servic1 = array($obj->RepairPeople) as $r)
           {
            $obj->servicname = $r['name'];
           }
        }
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
