<?php

namespace Suxianjia\Xianjiasitemap\sitemap;

class ConfigClass
{

    private static ConfigClass $instance;
    private function __construct()    {    }
    private function __clone()    {    }
    public static function getInstance(): ConfigClass
    {
        if(!isset(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }
    /**
     * @var mixed
     */
    private static $config;

    public static function getConfig(){
        return  self::$config ;
    }

    public static function setConfig(array $input_config)
    {
        self::$config = require __DIR__ . '/../config.php';
        if (!empty(  $input_config )){
            self::$config = array_merge(self::$config, $input_config);
        }
        return self::$instance;
    }



}