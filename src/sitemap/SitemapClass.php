<?php

namespace Suxianjia\xianjiasitemap\sitemap;

use Suxianjia\xianjiaorm\orm\myPdo  as db;
use Suxianjia\xianjiaorm\orm\myDatabase;

use Suxianjia\xianjiasitemap\client\Sitemap;
use Suxianjia\xianjiasitemap\client\SitemapIndex;
use Suxianjia\xianjiasitemap\client\SitemapHtml;

date_default_timezone_set('PRC');
require __DIR__ . '/../fun.php';
use Suxianjia\xianjiasitemap\myConfig;
class SitemapClass
{
    /**
     * @var mixed
     */
    private static $config;

    private static $args;
    private static $instance;
    private static  int $file_max_length = 2000; //    // $file_max_length = 2000;// 每一个文件的最大长度 {"error":400,"message":"only 2000 urls are allowed once"} \n
    private static  int $listRows = 2000;  
    public static function getInstance( ) {

 


        if (self::$instance === null) {
            
            self::init();
            self::$instance = new self();
        }
        return self::$instance;
    }


    private function __construct()
    {
        //...
    }
    private static function init()
    {
        self::setListRows(  2000);
        self::set_file_max_length(2000);
        self::setConfig();
    }

    // file_max_length 
private static function set_file_max_length(int $file_max_length = 0){
    self::$file_max_length = $file_max_length;
} 
private static function get_file_max_length() : int {
    return self::$file_max_length;
}
//
//  
private static function setListRows(int $rows): void {
    self::$listRows = $rows;
}

private static function getListRows(): int {
    return self::$listRows;
}

    public static function setArgs(array $args = []) : void
    {
        $args['type'] = $args['type'] ?? "xml";
        self::$args = $args;
    }


    public static function setConfig(array $array = []):  void
    {
        // self::$config = ConfigClass::getInstance()::setConfig($array)::getConfig();
        self::$config = myConfig::getInstance()::getSitemapConfig();
        // var_dump(   self::$config  ); exit;

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
        $results = ['code' => 500, 'msg' => 'Failed', 'data' => []];
        $res = self::GenerateAllFiles( ) ;
        if( $res ['code'] === 200){
            $results['code'] = 200;
            $results['msg'] = 'Success';
        }
        $results['data'] =  $res ['data'] ;
        return $results ;
    }


 


 

private static function getAllData(): array {
    $results = ['code' => 500, 'msg' => 'Failed', 'data' => [
    'lastsql' => [],
    'url_index' =>0,
    'url_arr'=> [],
    'error_arr' => [],
    ]];
    $url_arr = [];
    $url_index = 0;
    $config = self::getConfig(); 
 
    foreach ( $config['scan_url_list'] AS $key => $item ) {
        echo '|----- foreach ' . $key . ' ----|' . PHP_EOL; // 换行符
        //       'status' => 1,//1:开启 0:关闭    
        if ( !isset($item['status']) || $item['status'] != 1 ) {
            echo '|----- 跳过 foreach  item[status] ' . $item['status'] . ' ----|' . PHP_EOL; // 换行符
            continue;
        }
        // $url = rtrim($item['loc'], '*')  ;
        // $url =  $item['loc']   ;
        $joinStr = isset($item['joinStr']) ? $item['joinStr'] : '';
        $counts = myDatabase::getInstance()->getCounts($item['tablename'],$item['whereStr'], $joinStr  );
        // echo myDatabase::getInstance()::getLastSql() ; exit;
        $results['data']['lastsql'][$key]['counts'] = myDatabase::getInstance()::getLastSql() ;
        if ( $counts['code'] != 200 && $counts['data']['count'] ==  0 ) {
            // 跳过 foreach 
            echo '|----- 跳过 foreach ' . $key . ' ----|' . PHP_EOL; // 换行符
            $results ['data']['error_arr'][] =   myDatabase::getInstance()::getLastError();   //$db::getMessage(); 
            continue;
        }
    


        
 
        $pageCount =  ceil( $counts['data']['count']   / self::getListRows() )  ;
        for ($page = 0; $page < $pageCount; $page++) {
            $offset = $page * self::getListRows() ;// joinStr
            $joinStr = isset($item['joinStr']) ? $item['joinStr'] : '';
            $item_data =  myDatabase::getInstance()->getdata($offset, self::getListRows() , $item['field'],  $joinStr, $item['whereStr'], $item['tablename'], $item['key']);
            // echo   myDatabase::getInstance()::getLastSql() ;
            $results['data']['lastsql'][$key]['lists'] = myDatabase::getInstance()::getLastSql() ;
            if ( $item_data['code'] != 200 ) {
                echo '|----- 跳过 for page' . $page . ' ----|' . PHP_EOL; // 换行符
                $results ['data']['error_arr'][] =   myDatabase::getInstance()::getLastError();   //$db::getMessage(); 
            }
 
     
            echo     "|----- for page:: /{$page}当前页" .$offset. "/一页多少".self::getListRows()."条，" .       "/总{$pageCount}页" .      "/共 ".$counts['data']['count'] ."条记录" ;
            foreach (  $item_data['data']   AS $keys => $value) {
                $url_index++;
 
                $priority  =   ( mt_rand(1, 10) / 10);
                $id = '';
                $url =  $item['loc'] ; 
                if ( isset($item ['key'] )){ 

                    if (strpos($item['key'], '.') !== false) {
                        $parts = explode('.', $item['key']);
                        $item['key'] = end($parts); // Take the last part after splitting
                    }  
                    $id =  $value[ $item ['key'] ];
                    $url = str_replace('{{id}}', $id, $item['loc']); // Replace {{id}} with $id
                }
         
                $url_arr[] = $q = ['a' =>  '', 'loc'=> $url  , 'id'=>  $id , 'title_ru'=>"" , 'title_en'=>"" , 'title'=> $value['title'],'times'=> $value['times'],'priority'=> $priority  ];
                // echo "|-----item: ".json_encode( $q, JSON_UNESCAPED_UNICODE) .  ' ----|' . PHP_EOL; // 换行符  ).'--|'.PHP_EOL;
                echo '|-----INDEX: '.$key .' ,  url_index:' . $url_index .'     ' . 'id:  ' .  $value[ $item ['key'] ].  ' ----|' . PHP_EOL; // 换行符
            }
        }
  
 
        echo '|----- -------'.PHP_EOL;
    }
    $results ['data']['url_arr'] =  $url_arr;
    $results ['data']['url_index'] =  $url_index;
    return $results;
}


//---------  生成所有的数据


// urllist.txt  2025-04-10  13:30:32  12610148
//$prefix = ""
private static function GenerateAllFiles( ) :array|string {
    $results = ['code' => 500, 'msg' => 'Failed', 'data' => [],'ExecuteCommand' =>  "php  test.php type=txt   (xml|txt|html)",   'error' => '', 'lastsql' => null,   'tempfile'=> " ", 'index' =>  null,  "time:" => date('Y-m-d H:i:s', time())] ;
    $results ['data']['url_index'] =0;
 

    $config = self::getConfig();//_config();
    $start = microtime(true);
    try {
       
        header("Content-Type: text/plain");
        $getAllData = self::getAllData();
        $results ['data']['error_arr']         = $getAllData['data']['error_arr'];
        $results['data']['lastsql'] = $getAllData['data']['lastsql'];
   
        echo '|----- 动态的 URLS ----|' . PHP_EOL; // 换行符
        //动态的 URLS
        $url_index   = $getAllData['data']['url_index']  ; 
        $url_arr     = $getAllData['data']['url_arr']  ;
         //静态的 URLS
         echo '|----- 静态的 URLS ----|' . PHP_EOL; // 换行符
         foreach (  $config['static_urls'] AS $key => $item ) {
            $url_index++;
             echo '|-----INDEX static_urls url_index: ' . $url_index. ' ----|' . PHP_EOL; // 换行符
             $id = isset( $item['id']  ) ? $item['id'] : '';
             $url_arr [ ] = ['a' =>  "", 'loc'=> $item['loc'] , 'id'=>   $id ,  'title_ru'=> $item['title_ru']   ,  'title_en'=> $item['title_en']   , 'title'=> $item['title'] ,'times'=>$item['times'] ,'priority'=> $item['priority']   ];
         }    
         
         $results ['data']['url_index'] =$url_index;
         //静态的 URLS end 
                 $splitArray = array_chunk($url_arr, self::get_file_max_length() );
//  


        // // 输出分割后的数组
        $split_file_index = 0;
        $filenames = [];
        foreach ($splitArray AS $index => $data) {
            if( $split_file_index > 0){
                $filenames['txt'] =    'urls-'.$split_file_index.'.txt';
                $filenames['xml']  =    'sitemap-'.$split_file_index.'.xml';
                $filenames['html']  =    'sitemap-'.$split_file_index.'.html';
            }else{
                $filenames['txt']  =    'urls.txt';
                $filenames['xml']  =    'sitemap.xml';
                $filenames['html']  = 'sitemap.html';
            }
            self::Generatefiles(   $data,  $filenames);//生成文件
            $split_file_index ++;
        }


        
        $results[ 'code' ] = 200;
        $results[ 'msg' ] = 'success';
    }catch (\Exception $e){
        $results ['data']['error_arr']  = $e->getMessage() ;
        return $results;
    }
 
    // sitemap_index

    self::sitemap_index($url_index  );

//sitemap_index


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
    $CopyingFiles = 0;
    foreach ($files as $file) {
        //  忽略 .gitignore文件 不复制
        if (basename($file) == '.gitignore') {
            continue;
        }
        if (is_file($file)) {
            $destination_file = $targetDir . basename($file);
            $CopyingFiles ++;
            echo "|--CopyingFiles : ".$CopyingFiles. ",  Copying ".basename($file)." to $destination_file --- ".PHP_EOL;
            if (!copy($file, $destination_file)) {
                throw new \Exception("Failed to copy file: " . $file . " to " . $destination_file);
            }else{
               chmod($destination_file, $config['permissions']); 
            }
        }
    }
    $results  ['data']['CopyingFiles']  =    $CopyingFiles;
    $results  ['data']['split_file_index']     = $split_file_index;
    return $results;
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
                $file[$filename_k] = $config['file_dir'].'/'.$value['prefix'].$filename_v;
                $file_stream = fopen($file[$filename_k], "w") or die("Error: Could not create temporary file ".$file[$filename_k]." \n");
                if ($filename_k == 'txt') {
                    foreach ($datas as $k => $v) { 
                        // $router_url = $v['loc'].$v['id'];
                        // if($v['id'] == 0 ){
                            $router_url = $v['loc'];
                        // } 
                        fwrite( $file_stream, $value['domain'].$router_url.PHP_EOL );
                    }
                    // end 
                }else if ($filename_k == 'xml') {
           
                        $sitemap = new Sitemap($file[$filename_k]);//__DIR__ . '/sitemap.xml');
                        foreach ($datas as $k => $v) { 
                            // $router_url = $v['loc'].$v['id'];
                            // if($v['id'] == 0 ){
                                $router_url = $v['loc'];
                            // } 
                            $update_week = rand(1, 10) / 10.0;
                            // 判断时间格式 是时间戳 还是 时间字符串

                            if (is_numeric($v['times'])) {
                                    $times = (int)$v['times'];
                            } elseif (strtotime($v['times']) !== false) {
                                    $times = strtotime($v['times']);
                            } else {
                                    $times = time(); // Default to current time if format is invalid
                            }
                            $sitemap->addItem( $value['domain'].$router_url,  $times, Sitemap::DAILY, $update_week );
                        }
                        $sitemap->write();
                        unset($sitemap);
                    // end
                }else if ($filename_k == 'html') {
                    $sitemap = new SitemapHtml($file[$filename_k]);//__DIR__ . '/sitemap.xml');
                    // addItem
                    foreach ($datas as $k => $v) { 
                        // $router_url = $v['loc'].$v['id'];
                        // if($v['id'] == 0 ){
                             $router_url = $v['loc'];
                        // } 
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
        $results ['data']['error_arr'] =  $e->getMessage() ;
    }
    return  $result;
}
//-----------------  
 private static function sitemap_index ($url_index  ){ 
    $config = self::getConfig();//_config();
    foreach($config['site_list'] AS $site_key => $site_value) { //prefix  domain
        
        // $config['file_dir']
        if ( !is_dir( $config['file_dir']  ) ){
            mkdir( $config['file_dir'], 0777 , true );
        }
        // if  //chmod
        chmod( $config['file_dir'], 0777 );
        // 
 
      

        $index_xml =  $config['file_dir'].'/'.$site_value['prefix']. 'sitemap_index.xml';
        $index_xml_stream = fopen(    $index_xml, "w") or die("Error: Could not create temporary file ".    $index_xml." \n");
        $index_xml_sitemap = new SitemapIndex( $index_xml);//__DIR__ . '/sitemap.xml');
        $len = ceil( $url_index  / self::get_file_max_length()  ); // Calculate the number of files needed  = 2000;// 每一个文件的最大长度 {"error":400,"message":"only 2000 urls are allowed once"} \n
        for ($i = 0; $i < $len; $i++) {
            $times = time();
            $router_url = '/sitemap.xml';
            if(  $i > 0){
                $router_url = '/sitemap-'.$i.'.xml';
            }
            $index_xml_sitemap->addSitemap( $site_value['domain'].$router_url,  $times );
        }
        $index_xml_sitemap->write();
        chmod($index_xml ,  $config['permissions'] );
        unset($index_xml_stream);
    }
}
  
//------
}