<?php

namespace Suxianjia\Xianjiasitemap\orm;


use think\facade\Db AS thinkDb;


class db
{
    private static $config;

    private static $instance;
    private function __construct()    {    }
    private function __clone()    {    }
    public static function getInstance( array  $config = []){
        self::$config = $config;
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function getdb ()
    {

// 数据库配置信息设置（全局有效）

     thinkDb::setConfig(self::$config['dbconfig']  );

     return  new   thinkDb;

    }






    public static  function getdata($page = 1,$listRows = 10,$field = "",$where = [], $tablename = 'account_ad' , $key='id'){
        $res = self::getdb()::table($tablename )->field( $field )->where($where )->page($page,$listRows)->order($key, 'desc')->select();
        return $res ;
    }






}