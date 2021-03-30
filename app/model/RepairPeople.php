<?php


namespace app\model;


use think\Model;

class repairPeople extends Model
{
    public function RepairRange()
    {
        return $this->hasOne('repairRange','repair_id','Id');
    }
}