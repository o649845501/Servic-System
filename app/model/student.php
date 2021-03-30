<?php


namespace app\model;

use think\Model;

class student extends Model
{
public function getStatusAttr($value)
{
    $status = [0 => '<span class="layui-badge">未维修</span>',1 => '<span class="layui-badge layui-bg-blue">已维修</span>'];
    return $status[$value];
}
}