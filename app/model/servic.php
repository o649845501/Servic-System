<?php


namespace app\model;

use think\Model;

class servic extends Model
{
public function getStatusAttr($value)
{
    $status = [0 => '<span class="layui-badge">未确认</span>',1 => '<span class="layui-badge layui-bg-blue">待维修</span>',2 => '<span class="layui-badge layui-bg-blue">维修完成</span>'];
    return $status[$value];
}
public  function setStatusAttr($value)
{
    $status = ["未维修" => '0',"待维修" => '1',"维修完成"=>'2'];
    return $status[$value];
}
    public function RepairPeople()
    {
        return $this->hasOne('repairPeople','user','servicuser');
    }

}