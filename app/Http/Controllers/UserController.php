<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class UserController extends Controller {
    //
    public function index() {

    }

    public function add() {

    }

//    public function show() {
//        return '这是一个show方法';
//    }

    public function edit($id) {
        echo '这里是用户的更新操作,要修改的用户id为' . $id;
    }

    public function delete() {
        echo route('udelete', ['id' => 100]);
        //return '这里是用户的删除操作';
    }

    public function shengji() {
        echo '这里是用户的升级';
    }

    public function qingqiu(Request $request) {
        $method = $request->method();
        $isMethod = $request->isMethod('get');
        var_dump($isMethod);
//        echo $method;
        //参数获取
        $username = $request->input('username', '未知');
        $request->header('key');
        //是否含有某个key并且key值不为空
        $request->has('key');
        //是否含有某个key 值不关注
        $request->exists('key');
        //全部参数
        $request->all();

        //返回某些特定的
        $request->only(['name','age']);
        //返回除了数组中 其他的
        $request->except(['name','age']);
        //只返回域名部分的url
        $request->url();
        //返回全部的url
        $request->fullUrl();
        echo $username;
        //echo '这是一个请求';
    }

    /**
     * 显示表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show() {
        return view('upload');
    }

    /**
     * 文件上传
     */
    public function upload(Request $request) {
//        echo 'upload';
        $res = $request->hasFile('profile');

        $res = $request->file('profile')->getSize();
        if ($res) {
            $request->file('profile')->move('./upload', 'liuyan.jpg');
        }
        var_dump($res);
    }

    public function cookie(Request $request) {
//        \Cookie::queue('name','xdl',20);
//        return response('')->withCookie('xiondilian','zhenbang',5);
        $res = \Cookie::get('xiondilian');
        var_dump($res);
        $res = $request->cookie('xiondilian');
        var_dump($res);
    }

    /**
     * 第一次请求写入
     * 第二次请求取用
     * 第三次请求消失了
     * 闪存
     */

    public function flash() {
        //自定义闪存
//        \Session::flash();
        return view('flash');
    }

    public function doflash(Request $request) {
        //var_dump($request->all());
        //闪存
        $request->flash();
        $request->flashOnly(['name']);
        $request->flashExcept(['name']);
        //
        $request->old();

        Request::old();
        //跳回原页面
        return back();
    }

    public function old() {
        echo old('username');
    }

    public function response() {
        //返回字符串
//        return 'response';
        //设置cookie response 需要内容
//        return response('')->withCookie('xiondilian','zhenbang',5);
        //返回json字符串
//        return response()->json(['name'=>'兄弟连',]);

        //下载 相对路径 脚本中相对路径是相对于当前正在请求的文件
//        return response()->download('./upload/liuyan.jpg');

        //页面跳转 两种写法
//        return response()->redirectTo();
//        return redirect('/form');
//        return redirect('http://www.baidu.com');

        //模版解析
//        return view('response');
        //设置和修改响应头
        return response('')->header('name', 'lamp');

    }

    public function view() {
//        return 'this is a view';
        //解析模版 分层模版
//        return view('user.index');
        //模版渲染
        $arr = ['name' => 'xdl', 'age' => 19, 'position' => '北京'];
        return view('user.xdl', ['xdl' => $arr]);

        return View('user.xdl')->with('xdl',$arr);
    }

    public function blade() {
        //路径分隔需要点
        return view('admin.user.index',
            [
                'title' => '用户的列表页',
                'username' => 'xdl',
                'page' => '<a href="./1.html">1</a><a href="./2.html">2</a><a href="./3.html">3</a>'
            ]);
    }

    public function page() {
        return view('page.index', ['title' => '首页']);
    }

    public function layout() {
        return view('layout.index');
    }

    public function extend() {
        return view('layout.extend');
    }

    public function liucheng() {
        return view('control.liucheng', ['total' => 60, 'sex' => 0]);
    }

    public function xunhuan() {
        return view('control.xunhuan', [
                'users' => [
                    ['username' => '小张','age'=>18],
                    ['username' => '小王','age'=>19],
                    ['username' => '小李','age'=>20],
                ]
            ]
        );
    }

    public function db() {
//        $res = DB::select("select * from goods where id < 2");
//       $res = DB::select("select * from goods where id = ?",[2]);

//       $res = DB::insert('insert into goods (`id`,`name`) values (4,"帽子")');
       //$res = DB::insert('insert into goods (id,name) values (?,?)',[5,'皮裤']);

//        $res = DB::update("update goods set name = '哈哈' where id = 2");

//        $res = DB::delete("delete from goods where id = 1");

        //一般语句
//        $res = DB::statement("create table test (id int primary key auto_increment,name varchar(65))");

        //事务操作
        DB::beginTransaction();
        $res = DB::update("update user set account = account - 2000 where id = 100");
        $res2 = DB::update("update user set account = account + 2000 where id = 2");

        if ($res && $res2){
            DB::commit();
        }else{
            DB::rollback();
        }

        //操作多个数据库
        DB::connection('mysql')->select();



        echo '<pre>';
        var_dump($res);

    }

    public function builder(){
        //查询构造器
//        $res = DB::table('user')->insert([
//            'username' =>'lamp',
//            'password' =>'lamp',
//            'account' => 20000,
//        ]);

        //多条插入
//        $res = DB::table('user')->insert([
//            ['username'=>'张三','password'=>'zhangsan','account'=>3000],
//            ['username'=>'李四','password'=>'lisi','account'=>4000],
//            ['username'=>'王五','password'=>'wangwu','account'=>5000],
//        ]);

        //插入并获取id
//        $res = DB::table('user')->insertGetId(['username'=>'赵六','password'=>'zhaoliu','account'=>6000]);

        //更新操作
//        $res = DB::table('user')->where('id','=',2)->update(['username'=>'打野']);

        //删除操作
//        $res = DB::table('goods')->where('id','<',100)->delete();

        //查询多条 tp 多条select 单条find
//        $res = DB::table('user')->get();
        //获取单条
//        $res = DB::table('user')->first();

        //获取单个结果中的某个字段值
//        $res = DB::table('user')->value('username');
        //获取列信息
//        $res = DB::table('user')->lists('username');

//        $res = DB::table('user')->select('username','password')->get();

//        $res = DB::table('user')->where('username','=','xdl')->first();
        //或者
//        $res = DB::table('user')->where('id','=',2)->orWhere('username','=','xdl')->get();

//        $res = DB::table('user')->whereBetween('id',[5,10])->get();

//        $res = DB::table('user')->whereIn('id',[3,4,7])->get();

//        $res = DB::table('user')->orderBy('id','desc');

//        $res = DB::table('user')->skip(5)->take(4)->get();

//        $res = DB::table('user')->leftJoin('cate','cate.id','=','user.cid')
//            ->where('user.id','<',30)
//            ->get();

//        $res = DB::table('user')->where('id','<',7)->count();
//        $res = DB::table('user')->max('username');
//        $res = DB::table('user')->min('username');
        $res = DB::table('user')->avg('id');
        echo '<pre>';
        dd($res);
    }

    //表单验证
    public function valida(Request $request) {
        $all = $request->all();
        $a = $request->get();
        $va = Validator::make($all,[
            'username' => 'required|between:4,32|unique:users',//必须 在4到32之间 在users表是唯一存在
            'phone' => 'numeric|required'
        ]);

        if ($va->fails()){
            return $va->errors();
        }

        return '验证通过';
    }

    public function HashEn() {
        //加密
        $password = '12345';
        $hpass = Hash::make($password);

        if (Hash::check($password,$hpass)){
            return '密码输入正确';
        }
        return $hpass;
    }

    public function helpFunc() {
        head();
        $array = ['name'=>1,'age'=>2];
        $res = array_only($array,['name']); //返回数组中指定字段
        array_first($array,function ($key,$value){

        });

        return app_path();
        return config_path();
        return storage_path();
        return public_path();
    }

}
