<?php


namespace app\model;


use think\Model;

class User extends Model
{
    //用户名搜索器
public function SearchusernameAttr($qury,$valu)
{
    return $valu ? $qury -> where('username','like', '%'.$valu.'%') : '';
}
//status获取器
public function getStatusAttr($value)
{
    $status = [1 => '已通过', 0 => '未通过'];
    return $status[$value];
}
//badge获取器
public  function getBadgeAttr($value, $data)
{
    return $data['status'] ? 'success' : 'warning';
}
}