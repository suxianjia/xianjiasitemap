<?php
require __DIR__ . '/vendor/autoload.php';

use Suxianjia\Xianjiasitemap\sitemap\SitemapClass;

class main
{




        //  php example_bin/test.php type=txt  当天更新的数据
        //  php example_bin/test.php type=xml
    // php82  main.php type=xml

        public function main(array  $args = []) {
            $this_config = require __DIR__ . '/config.php';
            $type = isset($args['type']) ? $args['type'] :   "xml";

            SitemapClass::setArgs($args );
            SitemapClass::setConfig( $this_config );

            $res =   SitemapClass::generate( );
            return $res;
        }


    }
$args ['a'] = 'run';
// Add PHP CLI support
if (php_sapi_name() === 'cli' && PHP_OS != 'WINNT') {
parse_str(implode('&', array_slice($argv, 1)), $args);
}


$main = new main();
$res = $main->main($args);

var_dump($res);
