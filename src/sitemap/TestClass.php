<?php

namespace Suxianjia\Xianjiasitemap\sitemap;
require __DIR__ . '/../fun.php';
class TestClass
{
    private static $config;

private static $args;
public static function init(array $args = []):TestClass {
    self::$args = $args;
    return new self;
}

    public static function set_config(array $array = []):TestClass
    {
        self::$config = ConfigClass::getInstance()::setConfig($array)::getConfig();
        return new self;
    }

    public static function get_config( ):array
    {
        return self::$config;
    }

    public static function generate():array{
        return ["time:" => time(), "args" => self::$args , 'config' => self::get_config( ) ] ;
    }



}