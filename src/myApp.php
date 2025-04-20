<?php 
namespace Suxianjia\Xianjiasitemap;
use Suxianjia\Xianjiasitemap\myConfig;
use Exception;
use Suxianjia\xianjiaocr\client\OCRClient;
use Suxianjia\xianjiaocr\orm\myDatabase;
use Suxianjia\xianjiaocr\client\myLogClient;


class myApp {
    

    private static $instance = null;
 

    private function __construct() {
        // Private constructor to prevent direct instantiation
    }
 
    public static function getInstance(): myApp { 
 

        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

 
}
