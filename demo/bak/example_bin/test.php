<?php
error_reporting(E_ALL | E_STRICT);

require __DIR__ . '/../vendor/autoload.php';

use Suxianjia\Xianjiasitemap\sitemap\SitemapClass;





//var_dump(['1','2','3']);
//
//var_dump(123);

class index {

    //  php example_bin/test.php type=txt
    //  use Suxianjia\Xianjiasitemap\sitemap\SitemapClass;

    public function run(array  $args = []): array|string
    {
        $this_config = require __DIR__ . '/config.php';

        SitemapClass::setArgs($args);
        SitemapClass::setConfig( $this_config );
         return SitemapClass::generate();
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
