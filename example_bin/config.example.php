<?php
return array(
//    'site' => "https://packagist.com", //不要带斜杠
// https://      /article/get?article_id=1115




    'site' => "https://www.u .com", //不要带斜杠
    'changefreq' =>  'weekly', // weekly daily     changefreq：页面内容更新频率。
    'priority' =>  0.5, //priority：相对于其他页面的优先权
    'lastmod' =>  date('Y-m-d H:i:s', time()) , //lastmod：页面最后修改时间


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
                'hostname' => '127.0.0.1',
                // 用户名
                'username' => 'root',
                // 数据库密码
                'password'    => '654321mm',
                // 数据库连接端口
                'hostport'    => '3306',
                // 数据库连接参数
                'params'      => [],
                //'dsn' => 'mysql:dbname=testdb;host=127.0.0.1'
                'dsn' => 'mysql:dbname=testdb;host=127.0.0.1',

                // 数据库名
                'database' => '',
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
    'file_dir' => '/Users/dev/PhpstormProjects/xianjiasitemap/public_html/',
    'file_xml' => "sitemap.xml",
    'file_txt' => "urllist.txt",
    'file_html' => "sitemap.html",
    'file_robots' => "robots.txt",
    'permissions' => 0644,

//    scan_url_list
    'scan_url_list' => array(

        'article' =>   array(
            'loc'=>'/article/get?article_id=*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  0.5,
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 1200,
            'tablename' => 'cms_article_base' ,
            'key' =>  'article_id',
            'field' => 'article_id,article_title AS title' ,
            'where' => ['article_status' => 1 ],
             'whereStr' => '',
        ),
        'product' => array(
            'loc'=>'/product/detail?item_id=*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  0.5,
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 5000,
            'tablename' => 'shop_product_base' ,
            'key' =>  'product_id',
            'field' => 'product_id ,product_name AS title',
            'where' => [],
            'whereStr' => '',
        ),
        // /store/get?store_id=3137
        'store' => array(
            'loc'=>'/store/get?store_id=*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  0.5,
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 3000,
            'tablename' => 'shop_store_base' ,
            'key' =>  'store_id',
            'field' => 'store_id,store_name AS title',
            'where' => ['store_is_open' => 1 ],
            'whereStr' => '',
        ),
        //   /exhibition/detail?exhibition_id=22  `exhibition_base` ORDER BY `exhibition_base`.`exhibition_id` ASC

        'exhibition' => array(
            'loc'=>'/exhibition/detail?exhibition_id=*',
            'changefreq' =>  'weekly', // weekly daily
            'priority' =>  0.5,
            'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            'type' => 'number',
            'min' =>  1990 ,
            'max' => 2000 ,
            'offset' => 0,
            'listRows' => 20,
            'tablename' => 'exhibition_base' ,
            'key' =>  'exhibition_id',
            'field' => 'exhibition_id,exhibition_name AS title ',
            'where' => [/*   'exhibition_status' => 1001  */ ],
            'whereStr' => '',
        ),


    ),
// blacklist
    'blacklist' => array(
        "*.jpg",
        "*/secrets/*",

    ),


    'xmlheader' => '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">',



);