<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function getAdd(){
        //echo '这是一个商品的添加操作';
        return view('add');
    }

    public function getShow() {
        echo '这是一个展示操作';
    }

    public function postInsert() {
        echo '这是一个post操作';
    }
}
