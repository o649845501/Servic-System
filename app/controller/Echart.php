<?php


namespace app\controller;


use think\facade\View;

class Echart
{
public function index()
{
    return View::fetch('Echarts/Repair_n');
}
}