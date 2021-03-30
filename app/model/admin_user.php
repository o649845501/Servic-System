<?php


namespace app\model;
use think\Model;

class admin_user extends Model
{
public function selectuser()
{

}
public function getStatusAttr($value)
{
    $status = [0 => '<span class="layui-badge">已停用</span>',1 => '<span class="layui-badge layui-bg-green">已启用</span>'];
    return $status[$value];
}
public function setStatusAttr($value)
{
    $status = ['<span class="layui-badge">已停用</span>' => 0,'<span class="layui-badge layui-bg-green">已启用</span>' => 1];
    return $status[$value];
}
}