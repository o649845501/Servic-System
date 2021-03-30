<?php


namespace app\model;


use think\Model;

class wx_user extends Model
{
    public function searchUserAttr($query, $value, $data)
    {
        $query->where('user', $value . '%');
    }
    public function searchPasswordAttr($query, $value, $data)
    {
        $query->where('Password', $value . '%');
    }
}