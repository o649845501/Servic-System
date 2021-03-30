<?php
declare (strict_types = 1);

namespace app\controller;

use think\exception\ValidateException;
use think\facade\View;
use think\Request;
use app\model\User as Usermodel;
use app\validate\User as Uservalidate;
class User
{
    /**
     * 显示资源列表
     *
     * @return string
     */
    public function index()
    {
        return view('index');
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->param();
        try {
            //            dd($exception->getError());
            validate(UserValidate::class)->batch(true)->check($data);
        } catch (ValidateException $exception) {
            return view('../view/public/toast.html' , [
                'infos' => $exception->getError(),
                'url_text' => '返回上一页',
                'url_path' => url('/user/create')
                ]);
        }
        //密码加密
        $data['password'] = sha1($data['password']);
        //写入数据库
        $id = Usermodel::create($data)->getData('id');
        return $id ? view('../view/public/toast.html' , [
            'infos' => '恭喜注册成功',
            'url_text' => '去首页',
            'url_path' => url('/user/user')
        ]) : '注册失败';
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
