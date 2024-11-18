<?php
error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

use Suxianjia\Xianjiasitemap\sitemap\Test;



//use suxianjia\xianjiasitemap\sitemap\Sitemap ;
//var_dump(['1','2','3']);
//
//var_dump(123);

class index {

    public function index() {

//        Sitemap::generate();
    Test::test();

    }


}


$Index = new index();
$Index->index();
