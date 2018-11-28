<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\admin\LoginRequest;
use App\Models\model\Admins;

class Login extends \App\Http\Controllers\Base
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登录界面
     */
    public function login()
    {

        if (session('userInfo')){
            return redirect('index/index');
        }
        return view('admin/login/login');
    }


    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 验证登录账号及密码
     */
    public function check(LoginRequest $request)
    {
        $admin = Admins::where(['user_name'=>$request->user_name])->first();
        if (!$admin) return redirect()->back()->withInput()->withErrors('用户不存在');

        if (md5($request->password.'tz') != $admin->password) return redirect()->back()->withInput()->withErrors('密码错误');

       session()->put('userInfo',$admin->toArray());

        return redirect('index/index');

    }

    





}
