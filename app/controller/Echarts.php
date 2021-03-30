<?php


namespace app\controller;

use app\model\servic;
use think\facade\Db;
use think\helper\Str;
use function Sodium\add;

class Echarts
{
public function index()
{

}
public function wheretime()
{
    for ($i = 1;$i<31;$i+=6)
    {

        $time = vsprintf('2021-02-%s',$i);
        $count = Db::table('servic')
            ->whereWeek('creat_time',$time)
            ->select()->count();
        $datacount = array();
        array_push($datacount,$count);
    }
    return json_encode($datacount);

//for ($i = 1;$i<31;$i++)
//{
//    if ($i<10)
//    {
//    $count = servic::whereDay('creat_time','2021-02-0'+$i)->select()->count();
//    }
//}

}
public function servicthan()
{

$servicnum0 = servic::where('status','0')->select()->count();
$servicnum1 = servic::where('status','1')->select()->count();
$servicnum2 = servic::where('status','2')->select()->count();
return view('Echarts/Repair_n',[
    'value1' => $servicnum0,
    'value2' => $servicnum1,
    'value3' => $servicnum2
]);
}
}