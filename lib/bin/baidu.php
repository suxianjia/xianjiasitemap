<?php
#!/usr/bin/php

//https://ziyuan.baidu.com/college/courseinfo?id=267&page=2#h2_article_title8
// https://www.u-petrol.com/sitemap.xml

// site	是	string	在搜索资源平台验证的站点，比如www.example.com
// token	是	string	在搜索资源平台申请的推送用的准入密钥
//   接口调用地址：http://data.zz.baidu.com/urls?site=https://www.u-petrol.com&token=l5Phr8gzhDasNWHW
// $site  =  'https://www.u-petrol.com';
// $token =  'l5Phr8gzhDasNWHW';

// $urls = array(
//     // $token.'http://www.example.com/1.html',
//     // $token.'http://www.example.com/2.html',


// $site.'/product/detail?item_id=37437',
// $site.'/product/detail?item_id=37438',
// $site.'/product/detail?item_id=37440',
// $site.'/product/detail?item_id=39181',
// $site.'/product/detail?item_id=39182',
// $site.'/product/detail?item_id=39184',
// $site.'/product/detail?item_id=39185',
// $site.'/product/detail?item_id=39186',
// $site.'/product/detail?item_id=39187',
// $site.'/product/detail?item_id=39189',
// $site.'/product/detail?item_id=39192',


// );
// //$api = 'http://data.zz.baidu.com/urls?site=https://www.u-petrol.com&token=NlYlb9Z4EXFXpNM4';
// $api = 'http://data.zz.baidu.com/urls?site='.$site.'&token='.$token;
// $ch = curl_init();
// $options =  array(
//     CURLOPT_URL => $api,
//     CURLOPT_POST => true,
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_POSTFIELDS => implode("\n", $urls),
//     CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
// );
// curl_setopt_array($ch, $options);
// $result = curl_exec($ch);
// // echo $result;
// echo "-----------------------".PHP_EOL;//PHP_EOL
// var_dump(   $result  );



$urls = array(
    'http://www.example.com/1.html',
    'http://www.example.com/2.html',
);
$api = 'http://data.zz.baidu.com/urls?site=https://www.upetrol.net&token=ylIThrSYFtlfxoNb';
$ch = curl_init();
$options =  array(
    CURLOPT_URL => $api,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POSTFIELDS => implode("\n", $urls),
    CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
);
curl_setopt_array($ch, $options);
$result = curl_exec($ch);
echo $result;

