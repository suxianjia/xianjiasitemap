<?php


return [

    'version' => "v1.0.1"


    'db' => [
        'host' => 'DB_HOST_MASTER',
        'port' => 'DB_PORT_MASTER',
        'database' => 'DB_DATABASE_MASTER',
        'username' => 'DB_USERNAME_MASTER',
        'password' => 'DB_PASSWORD_MASTER',
    ],
    'ocr' => [
        'url' => 'OCR_URL',
        'token' => 'OCR_TOKEN',
        'model' => 'OCR_MODEL',
        'image_path' => 'OCR_IMAGE_PATH',
        'out_file_path' => 'OCR_OUT_FILE_PATH',
        'response_format' => 'OCR_RESPONSE_FORMAT',
    ],
    'log' => [
        'path' => __DIR__.'/temp',
        'type' => 'mysql',
 
    ],

'modelinfo' => [
    // 'ypc_news_base' , 'article_content','article_id' 
    'table_name' => 'table_name',
    'content_name' => 'content_name',
    'id_name' => 'id_name',
],




'site_list' => array(
    ['prefix'=>'','domain'=>"https://www.sitename.net"],
    ['prefix'=>'ru_','domain'=>"https://ru.sitename.net"],
    ['prefix'=>'en_','domain'=>"https://en.sitename.net"],
),

    'site' => "https://www.sitename.net", //不要带斜杠
    'use_list_site' => 1, //1 => site_list , 2 => site
    'changefreq' =>  'weekly', // weekly daily     changefreq：页面内容更新频率。
    // 'priority' =>   0.5, //priority：相对于其他页面的优先权 1.0 - 0.1 随机 0.0-1.0之间
    'priority' => mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) , //lastmod：页面最后修改时间

/*
r 数据库   :   ***** 
read 账号        :  	   ***** 
read pwd				 :   ***** @ ***** 
link						 :    ***** - ***** - ***** . ***** .rds. ***** .com（端口：3309）
port 						 :     3309
*/
//data
    'dbconfig' => [
        // 默认数据连接标识
        'default'     => 'mysql',
        // 数据库连接信息
        'connections' => [
            'mysql' => [
                // 数据库类型
                'type'     => 'mysql',
                // 主机地址
                // 'hostname' =>"rm- ***** .mysql.rds. ***** .com",// '127.0.0.1',
                    'hostname' =>" ***** - ***** - ***** .mysql.rds. ***** .com",
                    // "hostname"=> '127.0.0.1',
                // 用户名
                // 'username' => ' ***** ',// 'root',
                'username' => ' ***** ',// 'root',
                // 'username' =>   'root',
                // 数据库密码
                // 'password'    => " ***** @ ***** ",// ' ***** ',
                'password'    => ' ***** @ ***** ',// '654321mm',
                // 'password'    =>  '654321mm',
                // 数据库连接端口
                // 'hostport'    => 3308,
                'hostport'    => 3309,
                // 'hostport'    => 3306,
                // 数据库连接参数
                'params'      => [], //'dsn' => 'mysql:dbname=testdb;host=127.0.0.1;port=3306'
//$dsn = 'mysql:dbname=demo;host=localhost;port=3306';

                //   'dsn' => 'mysql:dbname= ***** ;host=rm- ***** .mysql.rds. ***** .com;port=3308',
                'dsn' =>  'mysql:dbname= ***** ;host=readonly- ***** - ***** .mysql.rds. ***** .com;port=3309',
                // 'dsn' =>  'mysql:dbname= ***** ;host=127.0.0.1;port=3306',
                // 数据库名
                'database' => ' ***** ',
                // 数据库编码默认采用utf8
                'charset'  => 'utf8',
                // 数据库表前缀

                'prefix'   => '',
                // 数据库调试模式
                'debug'    => true,
            ],
        ],
    ],




//curl
    'curl_validate_certificate' => true,
    // Set the user agent for crawler // 设置爬虫的用户代理
    'crawler_user_agent' =>   "Mozilla/5.0 (compatible; Sitemap Generator Crawler; +https://github.com/knyzorg/Sitemap-Generator-Crawler)",


//
    'phpversion' => phpversion() ,
//    file
// 'file_dir' => '/Users/yx-dev/work_directory/wwwroot/hainan-sitename-group-dev202406/dev-ops/sitemap/tempfiles/',//tempfiles
    'file_dir' =>   '/home/wwwroot/www.sitename.com/line/suteshop/tempfiles/',// //tempfiles  '/home/wwwroot/nginx_conf.sitename-dev202406/sitemap/',// '/Users/dev/PhpstormProjects/xianjiasitemap/public_html/',

  //  'file_dir' => '/Users/mycomputer/yxshsh-wwwroot/hainan-sitename-group-dev202406/nginx_conf.sitename-dev202406/sitemap/',
  "target_directory"=> '/Users/yx-dev/work_directory/wwwroot/hainan-sitename-group-dev202406/dev-ops/sitemap/target_directory/',

    'file_xml' => "sitemap.xml",
    'file_txt' => "urllist.txt", //当前更新的数据
    'file_html' => "sitemap.html",
    'file_robots' => "robots.txt",
    'permissions' => 0644,

// static_urls
     'static_urls' => array(
  
['id'=> 0,'loc'=> '/',                                              'title_ru'=> 'Домой-sitename-*******-ru.sitename.net',                                                      'title_en'=> 'home-sitename-*******-en.sitename.net',                                      'title'=> '首页-*******-www.sitename.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
['id'=> 0,'loc'=> '/login',                                         'title_ru'=> 'Войти в систему-sitename-*******-ru.sitename.net',                                            'title_en'=> 'login-sitename-*******-en.sitename.net',                                     'title'=> '登录-*******-www.sitename.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
['id'=> 0,'loc'=> '/register',                                      'title_ru'=> 'Регистрация-sitename-*******-ru.sitename.net',                                                'title_en'=> 'register-sitename-*******-en.sitename.net',                                  'title'=> '注册-*******-www.sitename.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
 





    ),


//    scan_url_list

//    单个Sitemap文件：大小不超过10MB，且包含不超过50000个网址。如果网站所包含的网址超过50,000个，则可将列表分割成多个Sitemap文件，放在Sitemap索引中
//单个Sitemap索引文件：大小不能超过500M，如果超过请提交多个Sitemap索引文件接口
//您可以采用如下三种格式的文件向360搜索提交Sitemap，文件编码可以是UTF-8或GBK：
//1）标准的XML格式文件
//2）文本格式文件
//3）Sitemap索引文件（可同时包含多个Sitemap文件）


    'scan_url_list' => array(

        'article' =>   array(
            // 'loc'=>'/article/get?article_id=*', //https://www.sitename.net/new_center/detail?article_id=7
            // 'loc'=>'/new_center/detail?article_id=*',
            'loc'=>'/new_center_detail/article_id/*',//  /new_center_detail/article_id=1
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 2500,
            'tablename' => 'ypc_news_base',// 'cms_article_base' , //ypc_news_base
            'key' =>  'article_id',
            'field' => 'article_id,article_title AS title' ,
            'where' => ['article_status' => 1 ],
            'whereStr' => ' article_status = 1',
        ),
        // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_name` ASC
        // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_id` ASC
        // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_state_id` ASC
        'product' => array(
            // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
            // 'loc'=>'/product/detail?item_id=*', //application_id https://www.sitename.net/new_product_detail?id=23974
            // 'loc'=>'/new_product_detail?id=*', //application_id https://www.sitename.net/new_product_detail?id=23974
            'loc'=>'/new_product_detail/id/*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 55000,
            'tablename' => 'shop_product_base' ,
            'key' =>  'product_id',
            'field' => 'product_id,product_name AS title,application_id',
            'where' => [],
            'whereStr' => 'application_id = 1601 AND product_state_id = 1001', //'product_state_id = 1002', 1002 上架 1001 下架. 
        ),
//================= 1603-二手设备
'product1603' => array(
    // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    // 'loc'=>'/product/detail?item_id=*', //application_id https://www.sitename.net/new_product_detail?id=23974
    // 'loc'=>'/second_hand_equipment_detail?id=*', //https://www.sitename.net/second_hand_equipment_detail?id=128523
    'loc'=>'/second_hand_equipment_detail/id/*',
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_base' ,
    'key' =>  'product_id',
    'field' => 'product_id,product_name AS title,application_id',
    'where' => [],
    'whereStr' => 'application_id = 1603 AND product_state_id = 1001', //'product_state_id = 1002', 1002 上架 1001 下架. 
),


//================= 1602-设备租赁
'product1602' => array(
    // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    // 'loc'=>'/product/detail?item_id=*', //application_id https://www.sitename.net/new_product_detail?id=23974
    // 'loc'=>'/rental_equipment_detail?id=*', //https://www.sitename.net/rental_equipment_detail?id=125739
    'loc'=>'/rental_equipment_detail/id/*',
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_base' ,
    'key' =>  'product_id',
    'field' => 'product_id,product_name AS title,application_id',
    'where' => [],
    'whereStr' => 'application_id = 1602 AND product_state_id = 1001', //'product_state_id = 1002', 1002 上架 1001 下架. 
),


//================= 1604-企业增值服务;
// 'product1604' => array(
//     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
//     // 'loc'=>'/product/detail?item_id=*', //application_id https://www.sitename.net/new_product_detail?id=23974
//     'loc'=>'/rental_equipment_detail?id=*', //https://www.sitename.net/rental_equipment_detail?id=125739
//     'changefreq' =>  'weekly', // weekly daily
//     'priority' =>  0.5,
//     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
//     'type' => 'number',
//     'min' =>  1990 ,
//     'max' => 2000 ,
//     'offset' => 0,
//     'listRows' => 45000,
//     'tablename' => 'shop_product_base' ,
//     'key' =>  'product_id',
//     'field' => 'product_id,product_name AS title,application_id',
//     'where' => [],
//     'whereStr' => 'application_id = 1604 & product_state_id = 1002', //'product_state_id = 1002', 1002 上架 1001 下架. 
// ),




        // /store/get?store_id=3137
        'store' => array(
            // 'loc'=>'/store/get?store_id=*', // https://www.sitename.net/store/index?store_id=2030
            // 'loc'=>'/store/index?store_id=*', 
            'loc'=>'/store_index/store_id/*', 
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 6000,
            'tablename' => 'shop_store_base' ,
            'key' =>  'store_id',
            'field' => 'store_id,store_name AS title',
            'where' => ['store_is_open' => 1 ],
            'whereStr' => ' store_is_open = 1',
        ),
        //   /exhibition/detail?exhibition_id=22  `exhibition_base` ORDER BY `exhibition_base`.`exhibition_id` ASC
// SELECT * FROM exhibition_base ORDER BY `exhibition_base`.`exhibition_id` ASC `exhibition_name` ASC
        'exhibition' => array(
            // 'loc'=>'/exhibition/detail?exhibition_id=*', //https://www.sitename.net/exhibition/detail?exhibition_id=22
            'loc'=>'/exhibition_detail/exhibition_id/*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  0.5,
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 120,
            'tablename' => 'exhibition_base' ,
            'key' =>  'exhibition_id',
            'field' => 'exhibition_id,exhibition_name AS title',
            'where' => [/*   'exhibition_status' => 1001  */ ],
            'whereStr' => 'exhibition_status = 1002',
        ),


    ),
// blacklist
    'blacklist' => array(
        "*.jpg",
        "*/secrets/*",

    ),

'xmlheader' => '<?xml version="1.0" encoding="UTF-8"?>
<urlset
xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'





];