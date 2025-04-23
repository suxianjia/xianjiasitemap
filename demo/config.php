<?php
return array(
//    'site' => "https://packagist.com", //不要带斜杠
// https://      /article/get?article_id=1115


    'site_list' => array(
        ['prefix'=>'','domain'=>"https://www.upetrol.net"],
        ['prefix'=>'ru_','domain'=>"https://ru.upetrol.net"],
        ['prefix'=>'en_','domain'=>"https://en.upetrol.net"],
    ),

    // 'site' => "https://www.upetrol.net", //不要带斜杠
    // 'use_list_site' => 1, //1 => site_list , 2 => site
    'changefreq' =>  'weekly', // weekly daily     changefreq：页面内容更新频率。
    // 'priority' =>   0.5, //priority：相对于其他页面的优先权 1.0 - 0.1 随机 0.0-1.0之间
    'priority' => mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) , //lastmod：页面最后修改时间

/*
r 数据库   :  www_u_petrol_com
read 账号        :  	  r_api_user_readonly
read pwd				 :  Rdbfd_tdh@8readonly80Db
link						 :   readonly-0859y717cv0-clusterd93.mysql.rds.aliyuncs.com（端口：3309）
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
                // 'hostname' =>"rm-7xvqz50859y717cv0.mysql.rds.aliyuncs.com",// '127.0.0.1',
                    // 'hostname' =>"readonly-0859y717cv0-clusterd93.mysql.rds.aliyuncs.com",
                    "hostname"=> '127.0.0.1',
                // 用户名
                // 'username' => 'w_api_user_master8',// 'root',
                // 'username' => 'r_api_user_readonly',// 'root',
                'username' =>   'root',
                // 数据库密码
                // 'password'    => "Wdbfd_tdh@8Wirte0Db",// '654321mm',
                // 'password'    => 'Rdbfd_tdh@8readonly80Db',// '654321mm',
                'password'    =>  '654321mm',
                // 数据库连接端口
                // 'hostport'    => 3308,
                // 'hostport'    => 3309,
                'hostport'    => 3306,
                // 数据库连接参数
                'params'      => [], //'dsn' => 'mysql:dbname=testdb;host=127.0.0.1;port=3306'
//$dsn = 'mysql:dbname=demo;host=localhost;port=3306';

                //   'dsn' => 'mysql:dbname=www_u_petrol_com;host=rm-7xvqz50859y717cv0.mysql.rds.aliyuncs.com;port=3308',
                // 'dsn' =>  'mysql:dbname=www_u_petrol_com;host=readonly-0859y717cv0-clusterd93.mysql.rds.aliyuncs.com;port=3309',
                'dsn' =>  'mysql:dbname=www_u_petrol_com;host=127.0.0.1;port=3306',
                // 数据库名
                'database' => 'www_u_petrol_com',
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

    // 'file_dir' =>   '/home/wwwroot/www.u-petrol.com/line/suteshop/',// '/home/wwwroot/nginx_conf.upetrol-dev202406/sitemap/',// '/Users/dev/PhpstormProjects/xianjiasitemap/public_html/',

  'file_dir'        => '/Users/yx-dev/work_directory/wwwroot/hainan-youxuan-group-dev202406/dev-ops/sitemap/tempfiles/',//tempfiles
  "target_directory"=> '/Users/yx-dev/work_directory/wwwroot/hainan-youxuan-group-dev202406/dev-ops/sitemap/target_directory/',

    'file_xml' => "sitemap.xml",
    'file_txt' => "urllist.txt", //当前更新的数据
    'file_html' => "sitemap.html",
    'file_robots' => "robots.txt",
    'permissions' => 0644,
 
// static_urls
'static_urls' => array(
  
    ['id'=> 0,'loc'=> '/',                                              'title_ru'=> 'Домой-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'home-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                      'title'=> '首页-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/new_product',                                   'title_ru'=> 'Новые продукты-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                             'title_en'=> 'new product-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                               'title'=> '新品设备-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/new_product_detail/id/129211',                  'title_ru'=> 'Подробная информация о новой продукции-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                     'title_en'=> 'new product detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                        'title'=> '新品设备-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/second_hand_equipment',                         'title_ru'=> 'Вторичное оборудование-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                     'title_en'=> 'second hand equipment-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                     'title'=> '二手设备-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/second_hand_equipment_detail/id/90909',         'title_ru'=> 'Вторичное оборудование - задняя страница-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                   'title_en'=> 'second hand equipment detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',              'title'=> '二手设备-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/rental_equipment',                              'title_ru'=> 'Аренда оборудования-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'rental equipment-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                          'title'=> '租赁设备-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/rental_equipment_detail/id/115009',             'title_ru'=> 'Аренда Оборудование Подробная информация-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                   'title_en'=> 'rental equipment detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                   'title'=> '租赁设备 详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/exhibition',                                    'title_ru'=> 'Выставки-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                   'title_en'=> 'exhibition-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '展览-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/exhibition_detail/exhibition_id/36',            'title_ru'=> 'Выставки-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                   'title_en'=> 'exhibition-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '展览 详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/supply_demand_list',                                 'title_ru'=> 'Спрос и предложение-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'supply demand-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                             'title'=> '供需-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/supply_demand_list/inquiry_type_flag/qiu_gou_01/order_field/created_at',                                 'title_ru'=> 'qiu_gou Спрос и предложение-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'qiu_gou supply demand-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                             'title'=> '求购-供需广场-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/supply_demand_list/inquiry_type_flag/gong_ying_02/order_field/created_at',                                 'title_ru'=> 'gong_ying Спрос и предложение-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'gong_ying supply demand-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                             'title'=> '供应-供需广场-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    
    // ['id'=> 0,'loc'=> '/supply_demand_detail/item_id/180',              'title_ru'=> 'Подробная информация о спросе и предложении-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                'title_en'=> 'supply demand detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                      'title'=> '供需详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/supply_demand_form',                            'title_ru'=> 'Таблица спроса и предложения-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                               'title_en'=> 'supply demand form-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                        'title'=> '供需提交表-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/tendering_bidding',                             'title_ru'=> 'Тендер - тендер-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                            'title_en'=> 'tendering bidding-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                         'title'=> '招标投标-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    //                 /tendering_bidding_detail/id/2716
    // ['id'=> 0,'loc'=> '/auction',                                       'title_ru'=> 'Аукцион-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                    'title_en'=> 'auction-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                   'title'=> '拍卖-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // /auction_detail/id/1846
    // ['id'=> 0,'loc'=> '/supervision_evaluation'    ,                    'title_ru'=> 'Контроль и оценка-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                          'title_en'=> 'supervision evaluation-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                    'title'=> '监督理评估-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/technical_service',                             'title_ru'=> 'Технические услуги-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'technical service-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                         'title'=> '技术服务-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    //                  /technical_service_detail/id/128384
    // ['id'=> 0,'loc'=> '/logistics_cooperation',                         'title_ru'=> 'Логистика - сотрудничество-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                 'title_en'=> 'logistics cooperation-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                     'title'=> '物流_合作-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    //                   /logistics_cooperation_detail/id/69269
    // ['id'=> 0,'loc'=> '/technology_transfer',                           'title_ru'=> 'Передача технологии-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'technology transfer-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                       'title'=> '技术转让-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/talent_exchange',                               'title_ru'=> 'Обмен талантами-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                            'title_en'=> 'talent exchange-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                           'title'=> '人才交流-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    //                 /talent_exchange_detail/id/2943
    //  ['id'=> 0,'loc'=> '/enterprise_services',                           'title_ru'=> 'Корпоративные услуги-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                       'title_en'=> 'enterprise services-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                       'title'=> '企业服务-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/merchant_join',                                 'title_ru'=> 'Инвесторы присоединяются-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                   'title_en'=> 'merchant join-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                             'title'=> '招商加盟-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/partner/add',                            'title_ru'=> 'Парень.-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                    'title_en'=> 'partner-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                   'title'=> '合作伙伴提交申请-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/specialist/add',                         'title_ru'=> 'Специалисты Добавить-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                       'title_en'=> 'specialist add-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                            'title'=> '专家 提交申请-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/specialist_list',                               'title_ru'=> 'Специалисты Список-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'specialist list-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                           'title'=> '专家 列表-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/specialist_detail/user_id/10099',               'title_ru'=> 'Специалисты Детали-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'specialist detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                         'title'=> '专家 详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/news_center_index/category_flag/zhan_hui_zi_xun',             'title_ru'=> 'Новый центр Индекс-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'new center index-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                          'title'=> '新闻中心类别列表-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/news_center_index/category_flag/hang_ye_zi_xun',             'title_ru'=> 'Новый центр Индекс-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'new center index-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                          'title'=> '新闻中心类别列表-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/new_center_detail/article_id/1',                'title_ru'=> 'Новый центр Детали-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'new center detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                         'title'=> '新闻中心详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/help_center',                                   'title_ru'=> 'Центр помощи-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                               'title_en'=> 'help center-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                               'title'=> '帮助中心-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    // ['id'=> 0,'loc'=> '/help_center/article_id/1046',                   'title_ru'=> 'Центр помощи Детали-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                        'title_en'=> 'help center detail-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                        'title'=> '帮助中心详情-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/ios_download',                                  'title_ru'=> 'IOS Скачать-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                'title_en'=> 'ios download-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                              'title'=> 'ios APP 应用下载-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/android_download',                              'title_ru'=> 'Скачать Android-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                            'title_en'=> 'android download-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                          'title'=> 'android APP 应用下载-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/login',                                         'title_ru'=> 'Войти в систему-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                            'title_en'=> 'login-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                     'title'=> '登录-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/register',                                      'title_ru'=> 'Регистрация-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                'title_en'=> 'register-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                  'title'=> '注册-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/help_center', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/news_center', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/exhibition', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/stores', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/add_services', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/leased_equipment', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/second_hand_equipment', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
    ['id'=> 0,'loc'=> '/search/key_type/new_equipment', 'title_ru'=> 'Поиск-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                                      'title_en'=> 'search for-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                                'title'=> '搜索-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
     
    
    
        ),
    
    
    //    scan_url_list
    
    //    单个Sitemap文件：大小不超过10MB，且包含不超过50000个网址。如果网站所包含的网址超过50,000个，则可将列表分割成多个Sitemap文件，放在Sitemap索引中
    //单个Sitemap索引文件：大小不能超过500M，如果超过请提交多个Sitemap索引文件接口
    //您可以采用如下三种格式的文件向360搜索提交Sitemap，文件编码可以是UTF-8或GBK：
    //1）标准的XML格式文件
    //2）文本格式文件
    //3）Sitemap索引文件（可同时包含多个Sitemap文件）
    
    
        'scan_url_list' => array(
    
    
    
    
            // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_name` ASC
            // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_id` ASC
            // SELECT * FROM shop_product_base ORDER BY `shop_product_base`.`product_state_id` ASC
            /*
SELECT
    shop_product_item.item_id,
    shop_product_item.product_id,
    shop_product_item.item_name,
    shop_product_base.product_name AS title,
    shop_product_base.product_add_time AS times,
    shop_product_base.application_id,
    shop_product_base.product_state_id
FROM
    shop_product_item  
RIGHT JOIN shop_product_base   ON
    (
shop_product_base.product_id = shop_product_item.product_id 
AND shop_product_base.application_id = 1601 
AND shop_product_base.product_state_id = 1001
    );
            */
            // 'product1601' => array(          // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
       
            //     'loc'=>'/new_product_detail/id/{{id}}',  
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 55000,
            //     'tablename' => 'shop_product_item' ,
            //     'key' =>  'item_id',
            //     'field' => "shop_product_item.item_id,
            //                 shop_product_item.product_id,
            //                 CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
            //                 shop_product_base.product_add_time AS times,
            //                 shop_product_base.application_id,
            //                 shop_product_base.product_state_id ",
            //     'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id AND shop_product_base.application_id = 1601 AND shop_product_base.product_state_id = 1001  )',
        
            //     'whereStr' => ' 1= 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
            // ),
    //================= 1603-二手设备   // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    // 'product1603' => array(
      
    
    //     'loc'=>'/second_hand_equipment_detail/id/{{id}}',  
    //     'changefreq' =>  'weekly', // weekly daily
    //     'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    //     'type' => 'number',
    //     'min' =>  1990 ,
    //     'max' => 2000 ,
    //     'offset' => 0,
    //     'listRows' => 55000,
    //     'tablename' => 'shop_product_item' ,
    //     'key' =>  'item_id',
    //     'field' => "shop_product_item.item_id,
    //                 shop_product_item.product_id,
    //                 CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
    //                 shop_product_base.product_add_time AS times,
    //                 shop_product_base.application_id,
    //                 shop_product_base.product_state_id ",
    //     'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id AND shop_product_base.application_id = 1601 AND shop_product_base.product_state_id = 1001  )',
 
    //     'whereStr' => ' 1= 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
    // ),
    
    
    //================= 1602-设备租赁    // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务; 
    // 'product1602' => array(
     
    //     'loc'=>'/rental_equipment_detail/id/{{id}}',  
    //     'changefreq' =>  'weekly', // weekly daily
    //     'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    //     'type' => 'number',
    //     'min' =>  1990 ,
    //     'max' => 2000 ,
    //     'offset' => 0,
    //     'listRows' => 55000,
    //     'tablename' => 'shop_product_item' ,
    //     'key' =>  'item_id',
    //     'field' => "shop_product_item.item_id,
    //                 shop_product_item.product_id,
    //                 CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
    //                 shop_product_base.product_add_time AS times,
    //                 shop_product_base.application_id,
    //                 shop_product_base.product_state_id ",
    //     'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id AND shop_product_base.application_id = 1601 AND shop_product_base.product_state_id = 1001  )',
    
    //     'whereStr' => ' 1= 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
    // ),
    

//================= 1604-企业增值服务;
/*
category_id     -- category_name        -- category_flag
1068            -- 拍卖                 -- auction
1325            -- 企业服务             -- enterprise_services
1070            -- 物流合作             -- logistics_cooperation
1069            -- 监理、评估           -- supervision_evaluation
1073            -- 人才交流             -- talent_exchange
1072            -- 技术服务             -- technical_service
1071            -- 技术转让             --technology_transfer
1067            -- 招投标               -- tendering_bidding
*/

//1067            -- 招投标               -- tendering_bidding
'product1604_1067' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/tendering_bidding_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1067 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),


//1071            -- 技术转让             --technology_transfer
'product1604_1071' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/technology_transfer_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1071 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),




//1072            -- 技术服务             -- technical_service
'product1604_1072' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/technical_service_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1072 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),




//1073            -- 人才交流             -- talent_exchange
'product1604_1073' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/talent_exchange_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1073 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),

//1069            -- 监理、评估           -- supervision_evaluation
'product1604_1069' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/supervision_evaluation_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1069 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),



//1070            -- 物流合作             -- logistics_cooperation
'product1604_1070' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/logistics_cooperation_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1070 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),


// 11325            -- 企业服务             -- enterprise_services  
'product1604_11325' => array(     // application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/enterprise_services_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 11325 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),
//1068            -- 拍卖                 -- auction
'product1604_1068' => array(     //  application_id 1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;
    'loc'=>'/auction_detail/id/{{id}}',  
    'changefreq' =>  'weekly', // weekly daily
    'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
    'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    'type' => 'number',
    'min' =>  1990 ,
    'max' => 2000 ,
    'offset' => 0,
    'listRows' => 55000,
    'tablename' => 'shop_product_item' ,
    'key' =>  'item_id',
    'field' => "shop_product_item.item_id,
                shop_product_item.product_id,
                CONCAT_WS(' - ', shop_product_base.product_name, shop_product_item.item_name) AS `title`,
                shop_product_base.product_add_time AS times,
                shop_product_base.application_id,
                shop_product_base.product_state_id    ",
    'joinStr' => ' RIGHT JOIN shop_product_base   ON ( shop_product_base.product_id = shop_product_item.product_id  AND shop_product_base.application_id = 1604 AND shop_product_base.product_state_id = 1001  )
     INNER JOIN shop_product_index AS spi_index ON ( shop_product_item.product_id = spi_index.product_id AND spi_index.category_id = 1068 ) ' ,
    'whereStr' => ' 1 = 1', //'product_state_id = 1002', 1002 上架 1001 下架. 
),
    
    //-------
    
    
            // /store/get?store_id=3137
            // 'store' => array(
            //     'loc'=>'/store_index/store_id/{{id}}',  
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>  mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 6000,
            //     'tablename' => 'shop_store_base' ,
            //     'key' =>  'store_id',
            //     'field' => 'store_id,store_name AS title , store_time AS times  ',
            //     'where' => ['store_is_open' => 1 ],
            //     'whereStr' => ' store_is_open = 1',
            // ),
            //   /exhibition_detail/exhibition_id/22  `exhibition_base` ORDER BY `exhibition_base`.`exhibition_id` ASC
    // SELECT * FROM exhibition_base ORDER BY `exhibition_base`.`exhibition_id` ASC `exhibition_name` ASC
            // 'exhibition' => array(
            //     'loc'=>'/exhibition_detail/exhibition_id/{{id}}',  
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>  0.5,
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 120,
            //     'tablename' => 'exhibition_base' ,
            //     'key' =>  'exhibition_id',
            //     'field' => 'exhibition_id,exhibition_name AS title , create_time AS times',
            //     'where' => [/*   'exhibition_status' => 1001  */ ],
            //     'whereStr' => 'exhibition_status = 1002',
            // ),
    // account_user_specialist   
    
    // 'account_user_specialist' => array( 
    //     'loc'=>'/specialist_detail/user_id/{{id}}',
    //     'changefreq' =>  'weekly', // weekly daily
    //     'priority' =>  0.5,
    //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    //     'type' => 'number',
    //     'min' =>  1990 ,
    //     'max' => 2000 ,
    //     'offset' => 0,
    //     'listRows' => 120,
    //     'tablename' => 'account_user_specialist' ,
    //     'key' =>  'user_id',
    //     'field' => 'user_id,user_realname AS title , user_created_time AS times',
    //     'where' => [/*   'exhibition_status' => 1001  */ ],
    //     'whereStr' => 'user_specialist_state = 2',
    // ),
    // https://www.upetrol.net/supply_demand_detail/item_id/185
    // 'ypc_supply_demand' => array(
    //     'loc'=>'/supply_demand_detail/item_id/{{id}}',
    //     'changefreq' =>  'weekly', // weekly daily
    //     'priority' =>  0.5,
    //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
    //     'type' => 'number',
    //     'min' =>  1990 ,
    //     'max' => 2000 ,
    //     'offset' => 0,
    //     'listRows' => 120,
    //     'tablename' => 'ypc_supply_demand' ,
    //     'key' =>  'id',
    //     'field' => '`id`,`title` , `created_at` AS `times`',
 
    //     'whereStr' => '`status` = 1',
    // ),
            //cms_article_base  文章 中心 
            // 'cms_article_base' =>   array(
                
            //     'loc'=>'/help_center/article_id/{{id}}',
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 2500,
            //     'tablename' => 'cms_article_base', 
            //     'key' =>  'article_id',
            //     'field' => 'article_id,article_title AS title,article_add_time AS times' ,
           
            //     'whereStr' => ' article_status = 1',
            // ),
    //帮助中心
            // 'cms_article_base' =>   array( 
            //     'loc'=>'/help_center/article_id/{{id}}',
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 2500,
            //     'tablename' => 'cms_article_base', 
            //     'key' =>  'article_id',
            //     'field' => 'article_id,article_title AS title,article_add_time AS times' ,
      
            //     'whereStr' => ' article_status = 1',
            // ),
            //cms_article_base  帮助中心
    
    
            //   文章 中心 
            // 'ypc_news_base' =>   array(
            //     'loc'=>'/new_center_detail/article_id/{{id}}', 
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 2500,
            //     'tablename' => 'ypc_news_base',// 'cms_article_base' , //ypc_news_base
            //     'key' =>  'article_id',
            //     'field' => 'article_id,article_title AS title,created_at AS times' ,
 
            //     'whereStr' => ' article_status = 1',
            // ), 
            
            //     文章 中心     END  ?source_lang=en-US https://www.upetrol.net/new_center_detail/source_lang/en-US/article_id/1
            //https://www.upetrol.net/new_center_detail/article_id/1/source_lang/en-US/
            // 'ypc_news_translate_en' =>   array(
            //     'loc'=>'/new_center_detail/article_id/{{id}}/source_lang/en-US/', 
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 2500,
            //     'tablename' => 'ypc_news_translate_en',// 'cms_article_base' , //ypc_news_base
            //     'key' =>  'article_id',
            //     'field' => 'article_id,article_title AS title,created_at AS times' ,
         
            //     'whereStr' => '1=1',
            // ), 
            
            //     文章 中心     END             source_lang=ru-RU
            // 'ypc_news_translate_ru' =>   array(
            //     'loc'=>'/new_center_detail/article_id/{{id}}/source_lang/en-US/', 
            //     'changefreq' =>  'weekly', // weekly daily
            //     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
            //     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
            //     'type' => 'number',
            //     'min' =>  1990 ,
            //     'max' => 2000 ,
            //     'offset' => 0,
            //     'listRows' => 2500,
            //     'tablename' => 'ypc_news_translate_ru',// 'cms_article_base' , //ypc_news_base
            //     'key' =>  'article_id',
            //     'field' => 'article_id,article_title AS title,created_at AS times' ,
              
            //     'whereStr' => ' 1=1 ',
            // ), 
            
            //     文章 中心     END  


            /*
['id'=> 0,'loc'=> '/news_center_index/category_flag/hang_ye_zi_xun',             'title_ru'=> 'Новый центр Индекс-upetrol-Нефтехимическая универсальная сервисная платформа-ru.upetrol.net',                                         'title_en'=> 'new center index-upetrol-One stop service platform for petroleum and petrochemical industry-en.upetrol.net',                          'title'=> '新闻中心类别列表-优派超-石油石化一站式服务平台-www.upetrol.net','times'=>   date('Y-m-d H:i:s', time())  ,'priority' =>  ( mt_rand(1, 10) / 10)],
category_flag
SELECT * FROM `ypc_news_category` ORDER BY `ypc_news_category`.`category_flag` ASC
category_id
*/
// 'ypc_news_category' =>   array(
//     'loc'=>'/news_center_index/category_flag/{{id}}', 
//     'changefreq' =>  'weekly', // weekly daily
//     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
//     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
//     'type' => 'number',
//     'min' =>  1990 ,
//     'max' => 2000 ,
//     'offset' => 0,
//     'listRows' => 2500,
//     'tablename' => 'ypc_news_category',// 'cms_article_base' , //ypc_news_base
//     'key' =>  'category_flag',
//     'field' => 'category_flag,category_name AS title,created_at AS times' ,
 
//     'whereStr' => ' 1=1',
// ), 


/*
shop_base_product_category 平台分类　
category_id
category_name
category_flag
application_id  【 应用id:1601-新品设备;1602-设备租赁;1603-二手设备;1604-企业增值服务;  】
SELECT * FROM `shop_base_product_category` WHERE `application_id` = 1604;
UPDATE `www_u_petrol_com`.`shop_base_product_category` SET `category_flag`='auction' WHERE `category_id`=1068;
ALTER TABLE `shop_base_product_category` ADD `created_at` INT NOT NULL COMMENT 'created_at' AFTER `category_flag`;
UPDATE `shop_base_product_category` SET `created_at` = '1744773190'  ;
// */ 
// 'shop_base_product_category1604' =>   array(
//     'loc'=>'/{{id}}', 
//     'changefreq' =>  'weekly', // weekly daily
//     'priority' =>   mt_rand(1, 10) / 10, // 优先权 1.0 - 0.1 随机 0.0-1.0之间
//     'lastmod' =>  date('Y-m-d H:i:s', time()) ,
//     'type' => 'number',
//     'min' =>  1990 ,
//     'max' => 2000 ,
//     'offset' => 0,
//     'listRows' => 2500,
//     'tablename' => 'shop_base_product_category',// 'cms_article_base' , //ypc_news_base
//     'key' =>  'category_flag',
//     'field' => 'category_flag,category_name AS title,created_at AS times' ,
 
//     'whereStr' => '  `application_id` = 1604',
// ), 



    ),
// blacklist
    'blacklist' => array(
        "*.jpg",
        "*/secrets/*",

    ),

    'xmlheader' => '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">',



);
