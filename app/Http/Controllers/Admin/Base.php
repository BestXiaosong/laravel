<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/6/006
 * Time: 22:11
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Base extends Controller
{

    public function __construct()
    {
        $session = session('userInfo');
        if (empty($session)){
            echo "<script>alert('请先登录');top.location.href = '/login/login'</script>";exit;
        }
    }

    public function index()
    {
        $menuList = $this->getMenuList();
        dd($menuList);
        return view('admin/public/index');
    }




    /**
     * 获取菜单列表
     * @return array
     */
    protected function getMenuList(){
        $uid = session('sss');
        if($uid==1){
            $menu_list = $this->getAllMenu();
        }else {
            $group_ids = Db::table('auth_group_access')->where(array('uid' => $uid))->pluck('group_id')->toArray();
            dd($group_ids);

            $group_rules = Db::table('auth_group')->where('id', 'in', $group_ids)->select()->toArray();
            dd($group_rules);
            $rules = "";
            foreach ($group_rules as $k => $v) {
                if ($k == 0) {
                    $rules = $v['rules'];
                }
                $rules .= "," . $v['rules'];
            }
            $rules = explode(',', $rules);
            $rules = array_unique($rules);
            $rule_name = Db::table('auth_rule')->where('id', 'in', $rules)->pluck('name');
            $rule_use = [];
            foreach ($rule_name as $vv) {
                $rule_use[] = strtolower($vv);
            }

            session('rules',$rule_name);
            $menu_list = $this->getAllMenu();
            foreach ($menu_list as $k => $v) {
                //判断是否有主菜单权限
                $url = $v['control'];
                if (!in_array($url, $rule_use)) {
                    unset($menu_list[$k]);
                }else{
                    foreach ($menu_list[$k]['sub_menu'] as $m => $i){
                        //判断是否有子菜单权限
                        $href = $i['control'] . '/' . $i['act'];
                        if (!in_array($href, $rule_use)) {
                            unset($menu_list[$k]['sub_menu'][$m]);
                        }
                    }
                }
            }

        }
        return $menu_list;
    }

    /**
     * 菜单列表详情
     * @return array
     */
    public function getAllMenu(){
        $data = DB::table('right')->get()->toArray();
        foreach($data as $k=>$v){
            $child = Db::table('right')->where(array('pid'=>$v['id'],'status'=>1))->select();
            if($child){
                $data[$k]['sub_menu'] = $child;
            }
        }
        return $data;
    }





}