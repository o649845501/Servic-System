<?php
declare (strict_types = 1);

namespace app\controller;

use app\middleware\Auth;
use think\Console;
use think\facade\Db;
use think\Request;
use app\model\RepairPeople;
use app\model\RepairRange;
use app\model\servic as cxservic;
class Servic
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    //protected $middleware = [Auth::class];
    public function index()
    {
        return view('servic/servicuser');
    }
    public function addservic()
    {
        return view('servic/add_servic');
    }

    public function wxnoservic()
    {
//跳过获取器查询原始数据
        $noservic = Db::table('servic')->where('status',0)->select();
        return $noservic;
    }
    public function wxyesservic()
    {
        $servicuser = $_GET['servicuser'];
        $where = array(
            'status' => 1,
            //上次工作
            'servicuser' => '1'
        );
        //跳过获取器查询原始数据
        $yesservic = Db::table('servic')->where('status',1)->select();
        return $yesservic;
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    //查询维修人员信息并返回layui 规定的json格式数据
    public function create()
    {
        $res = RepairPeople::with('RepairRange')->select();//查询数据
        $count1 = count($res);
       foreach ($res as $key=>$obj)
        {
           foreach ($repair = array($obj->RepairRange) as $r)
              {
                 $obj->range_name .= $r['range_name'];
                 $obj->range_number .= $r['range_number'];
                  $obj->range_grade .= $r['range_grade'];
              }
        }
        $data = array(     //封装数据
            'code'=> "0",
            'msg' => '',
            'count' => $count1,
            'data' => $res
        );
        echo json_encode($data); //返回数据
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    //添加维修员信息
    public function save(Request $request)
    {
        //管理员信息添加
        $data = $request->param();
        $people = array(
            'name' => $data['name'],
            'user' => $data['user'],
            'password' => sha1($data['password']),
            'gender' => $data['gender']
        );
        repairPeople::create($people);
        $id = repairPeople::where('user',$data['user'])->find();
        echo $id;
        $range = array(
            'range_name' => $data['range_name'],
            'range_number' => $data['range_number'],
            'range_grade' => $data['range_grade'],
            'repair_id'  => $id['Id']
        );
        RepairRange::create($range);
        return redirect('/index.php/servicuser');
    }
    public function wxservicindex()
    {
        $user = $_POST;
        return json_encode($user);
    }
    //维修员小程序点击确认订单后的相关函数
public function acceptservic()
{
    $id = $_GET;
    $data = cxservic::where('id',$id['id'])->find();
    $data->status = '待维修';
    $data->servicuser=$id['usersession'];
    $state = $data->save();
return strval($state);
}
public function okservic()
{
        $id = $_GET;
        $data = cxservic::where('id',$id['id'])->find();
        $data->status = '维修完成';
        $state = $data->save();
        return strval($state);
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
    public function delete()
    {
        $id = $_POST['str']['Id'];
        $delete = repairPeople::find($id);
        $delete->delete();
        if ( $delete->delete() == null)
        {
            echo 200; //查询错误返回
        }
        else
        {
            echo 500;//查询成功返回
        }

    }
}
