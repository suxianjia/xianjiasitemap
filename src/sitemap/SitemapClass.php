<?php

namespace Suxianjia\Xianjiasitemap\sitemap;

use Suxianjia\Xianjiasitemap\orm\pdo as db;

use Suxianjia\Xianjiasitemap\client\Sitemap;
use Suxianjia\Xianjiasitemap\client\SitemapIndex;
use Suxianjia\Xianjiasitemap\client\SitemapHtml;

date_default_timezone_set('PRC');
require __DIR__ . '/../fun.php';
class SitemapClass
{
    /**
     * @var mixed
     */
    private static $config;

    private static $args;
    public static function setArgs(array $args = []) : void
    {
        $args['type'] = $args['type'] ?? "xml";
        self::$args = $args;
    }


    public static function setConfig(array $array = []):  void
    {
        self::$config = ConfigClass::getInstance()::setConfig($array)::getConfig();

    }

    public static function getArgs() : array
    {
        return self::$args;
    }

    public static function getConfig( ):array
    {
        return self::$config;
    }

    public static function generate( ) :array {
        $res = [];
        $res['all'] = self::GenerateAllFiles( ) ;
        return $res ;
    }


 


 

private static function getAllData(): array {
    $FILE_INDEX = 0;
    $result = [];
    $result ['lastsql'] = [];
    $result ['FILE_INDEX'] =0;
    $result ['url_arr'] = [];
    $result [ 'error' ] = '';
    $config = self::getConfig();//_config();
    db::setConfig($config);
    $db = db::getInstance( );
    $result[ 'error' ] = $db::getMessage(); 
    foreach ( $config['scan_url_list'] AS $key => $item ) {
        echo '|----- ' . $key . ' ----|' . PHP_EOL; // 换行符
        $url = rtrim($item['loc'], '*')  ;
        $counts = $db::getcounts($item['whereStr'], $item['tablename']);
        $result['lastsql'][] = $db::getSql() ;
        $listRows = 2000; // {"error":400,"message":"only 2000 urls are allowed once"} \n
        $pageCount =  ceil($counts / $listRows)  ;
        for ($page = 0; $page < $pageCount; $page++) {
            $offset = $page * $listRows;
            $item_data = $db::getdata($offset, $listRows, $item['field'], $item['whereStr'], $item['tablename'], $item['key']);
            $result['lastsql'][] = $db::getSql() .   ":: /{$page}当前页" .$offset. "/一页多少{$listRows}条，" .       "/总{$pageCount}页" .      "/共{$counts}条记录" ;
            foreach ($item_data AS $keys => $value) {
                $FILE_INDEX ++;
                $priority  =   ( mt_rand(1, 10) / 10);
                $result ['url_arr'] [ $FILE_INDEX] = ['a' =>  '', 'loc'=> $url  , 'id'=>   $value[ $item ['key'] ]    , 'title_ru'=>"" , 'title_en'=>"" , 'title'=> $value['title'],'times'=> $value['times'],'priority'=> $priority  ];
                echo '|-----INDEX '.$key .'   ' . $FILE_INDEX.'     ' . 'id:  ' .  $value[ $item ['key'] ].  ' ----|' . PHP_EOL; // 换行符
            }
        }
        $result ['FILE_INDEX'] = $FILE_INDEX;
        $result[ 'error' ] = $db::getMessage(); 
        echo '|----- -------'.PHP_EOL;
    }
    return $result;
}


//---------  生成所有的数据


// urllist.txt  2025-04-10  13:30:32  12610148
//$prefix = ""
private static function GenerateAllFiles( ) :array|string {
    $FILE_MAX_LENGTH = 2000;// 每一个文件的最大长度 {"error":400,"message":"only 2000 urls are allowed once"} \n
    $FILE_INDEX=0; 
    $result = ['ExecuteCommand' =>  "php example_bin/test.php type=txt   (xml|txt|html)",   'error' => '', 'lastsql' => null,   'tempfile'=> " ", 'index' =>  null,  "time:" => date('Y-m-d H:i:s', time())] ;
    $config = self::getConfig();//_config();
    $start = microtime(true);
    try {
        $url_arr = [];
        header("Content-Type: text/plain");
        $ss = self::getAllData();
        $url_arr= $ss['url_arr'];
        $FILE_INDEX = $ss['FILE_INDEX'];
        $result[ 'error' ] = $ss['error'];
        $result[ 'lastsql' ] =$ss['lastsql'];
         //静态的 URLS
         echo '|----- 静态的 URLS ----|' . PHP_EOL; // 换行符
         echo '|----- ' . $FILE_INDEX . ' ----|' . PHP_EOL; // 换行符
         foreach (  $config['static_urls'] AS $key => $item ) {
             $FILE_INDEX ++;
             echo '|-----INDEX static_urls ' . $FILE_INDEX . ' ----|' . PHP_EOL; // 换行符
             $url_arr  [$FILE_INDEX] = ['a' =>  "", 'loc'=> $item['loc'] , 'id'=> $item['id'] ,  'title_ru'=> $item['title_ru']   ,  'title_en'=> $item['title_en']   , 'title'=> $item['title'] ,'times'=>$item['times'] ,'priority'=> $item['priority']   ];
         }     //静态的 URLS
        $splitArray = array_chunk($url_arr, $FILE_MAX_LENGTH);
        // 输出分割后的数组
        $file_index = 0;
        $filenames = [];
        foreach ($splitArray as $v) {
            if( $file_index > 0){
                $filenames['txt'] =    'urls-'.$file_index.'.txt';
                $filenames['xml']  =    'sitemap-'.$file_index.'.xml';
                $filenames['html']  =    'sitemap-'.$file_index.'.html';
            }else{
                $filenames['txt']  =    'urls.txt';
                $filenames['xml']  =    'sitemap.xml';
                $filenames['html']  = 'sitemap.html';
            }
            self::Generatefiles(   $v,  $filenames);//生成文件
            $file_index ++;
        }
    }catch (\Exception $e){
        $result[ 'error' ] = $e->getMessage() ;
    }
    $result['FILE_INDEX'] = $FILE_INDEX;
    // 
    foreach($config['site_list'] AS $site_key => $site_value) { //prefix  domain
        $index_xml =  $config['file_dir'].$site_value['prefix']. 'sitemap_index.xml';
        $index_xml_stream = fopen(    $index_xml, "w") or die("Error: Could not create temporary file ".    $index_xml." \n");
        $index_xml_sitemap = new SitemapIndex( $index_xml);//__DIR__ . '/sitemap.xml');
        $len = ceil($FILE_INDEX / $FILE_MAX_LENGTH); // Calculate the number of files needed
        for ($i = 0; $i < $len; $i++) {
            $times = time();
            $router_url = '/sitemap.xml';
            if(  $i > 0){
                $router_url = '/sitemap-'.$i.'.xml';
            }
            $index_xml_sitemap->addSitemap( $site_value['domain'].$router_url,  $times, null, null);
        }
        $index_xml_sitemap->write();
        chmod($index_xml ,  $config['permissions'] );
        unset($index_xml_stream);
    }



    $sourceDir = rtrim($config['file_dir'], '/') . '/';
    $targetDir = rtrim($config["target_directory"], '/') . '/';

    if (!is_dir($sourceDir)) {
        throw new \Exception("Source directory does not exist: " . $sourceDir);
    }

    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0755, true)) {
            throw new \Exception("Failed to create target directory: " . $targetDir);
        }
    }

    $files = glob($sourceDir . '*');
    foreach ($files as $file) {
        //  忽略 .gitignore文件 不复制
        if (basename($file) == '.gitignore') {
            continue;
        }
        if (is_file($file)) {
            $destination = $targetDir . basename($file);
            chmod( $destination ,  $config['permissions'] );
            echo "Copying .. to $destination\n";
            if (!copy($file, $destination)) {
                throw new \Exception("Failed to copy file: " . $file . " to " . $destination);
            }
        }
    }

    return $result;
}



//------------ 生成今天的数据

 





/**
 * 
 * 
 * 
 * 生成文件
 * 
 * 
 * */ 
private static function Generatefiles($datas,$filenames): array  {
    $result = ['error' => 0, 'tempfile'=> $filenames , 'index' => count($datas),  "time:" => date('Y-m-d H:i:s', time())] ;
    try {
        $config = self::getConfig(); 
        foreach($config['site_list'] AS $key => $value) { //prefix  domain
            foreach ($filenames as $filename_k => $filename_v) {
                $file[$filename_k] = $config['file_dir'].$value['prefix'].$filename_v;
                $file_stream = fopen($file[$filename_k], "w") or die("Error: Could not create temporary file ".$file[$filename_k]." \n");
                if ($filename_k == 'txt') {
                    foreach ($datas as $k => $v) { 
                        $router_url = $v['loc'].$v['id'];
                        if($v['id'] == 0 ){
                            $router_url = $v['loc'];
                        } 
                        fwrite( $file_stream, $value['domain'].$router_url.PHP_EOL );
                    }
                    // end 
                }else if ($filename_k == 'xml') {
           
                        $sitemap = new Sitemap($file[$filename_k]);//__DIR__ . '/sitemap.xml');
                        foreach ($datas as $k => $v) { 
                            $router_url = $v['loc'].$v['id'];
                            if($v['id'] == 0 ){
                                $router_url = $v['loc'];
                            } 
                            $update_week = rand(1, 10) / 10.0;
                            $times = strtotime($v['times']);
                            $sitemap->addItem( $value['domain'].$router_url,  $times, Sitemap::DAILY, $update_week );
                        }
                        $sitemap->write();
                        unset($sitemap);
                    // end
                }else if ($filename_k == 'html') {
                    $sitemap = new SitemapHtml($file[$filename_k]);//__DIR__ . '/sitemap.xml');
                    // addItem
                    foreach ($datas as $k => $v) { 
                        $router_url = $v['loc'].$v['id'];
                        if($v['id'] == 0 ){
                            $router_url = $v['loc'];
                        } 
                        $update_week = rand(1, 10) / 10.0;
                        // $times = strtotime($v['times']);
                        $sitemap->addItem( $value['domain'].$router_url,  $v['title']);
                    }
                    $sitemap->write();
                    unset($sitemap);

                    // end
                }else{
                    // end
                }  
                fclose($file_stream);
                chmod($file[$filename_k],  $config['permissions'] );
                unset($file_stream);

            }
        }
    }catch (\Exception $e){
        $result ['error']=  $e->getMessage() ;
    }
    return  $result;
}
//-----------------  

  
//------
}