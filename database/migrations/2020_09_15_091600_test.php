<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Test extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //php artisan migration 生成结构代码
        //php artisan migrate 生成表
        //php artisan migrate:refresh 修改表

        //执行迁移的时候
        if (!Schema::hasTable('test')) {
            Schema::Create('test', function (Blueprint $table) {
                $table->increments('id')->comment('主键字段');//创建主键字段
                $table->string('username')->nullable()->default('abc')->comment('用户名'); //创建名字字段
                $table->string('password', 100)->comment('密码'); //创建密码字段
                //添加新字段
                $table->string('nickname')->comment('昵称');
                $table->string('phone')->commnet('手机号');

                //加索引
                $table->unique('username');
                $table->index('nickname');

                $table->engine = 'innodb';
            });

        } else {
            Schema::table('test', function (Blueprint $table) {
                if (!Schema::hasColumn('test','sex')){
                    $table->tinyInteger('sex')->comment('性别');
                }
                if (!Schema::hasColumn('test','email')){
                    $table->string('email')->comment('邮箱');
                }
                if (Schema::hasColumn('test','password')){
                    $table->text('password')->change();
                }
                if (Schema::hasColumn('test','email')){
                    $table->dropColumn('email');
                }

                //操作索引
                //创建索引
                $table->index('password');

                //删除索引 主键
//                $table->dropPrimary();

                //删除索引名字

                $table->dropUnique();

                $table->dropIndex();


            });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //执行回滚的时候
        //删除表 会每次清空表数据
        //Schema::drop('test');
    }
}
