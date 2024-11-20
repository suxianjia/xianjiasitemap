<?php
error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

use Suxianjia\Xianjiasitemap\sitemap\SitemapClass;
use Suxianjia\Xianjiasitemap\sitemap\TestClass;




//var_dump(['1','2','3']);
//
//var_dump(123);

class index {

    //  php example_bin/test.php type=txt
    //  php example_bin/test.php type=xml

    public function run(array  $args = []) {
        $this_config = require __DIR__ . '/config.php';
        $type = isset($args['type']) ? $args['type'] :   "xml";
        $res =   SitemapClass::init($args )::set_config( $this_config )::generate($type);
        return $res;
    }


}
$args ['a'] = 'run';
// Add PHP CLI support
if (php_sapi_name() === 'cli' && PHP_OS != 'WINNT') {
    parse_str(implode('&', array_slice($argv, 1)), $args);
}


$Index = new index();
$res = $Index->run($args);

var_dump($res);
