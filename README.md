# xianjiasitemap


```angular2html
src/ 存放源代码文件
vendor/ 存放第三方依赖
composer.json 定义项目的元数据和依赖信息
README.md 项目的说明文档

|
|-- src    包源码
|    |-- orm/ 数据库操作层 
|    |-- sitemap/ 业务处理
|    |-- fun.php	公共方法
|
|-- example  一些实例
|
|-- example_bin  一些实例
|--  |-- test.php 入口 
|
|-- README.md
|
|-- composer.json


//  php example_bin/test.php type=txt
//  php example_bin/test.php type=xml
//  php example_bin/test.php type=html


git@github.com:suxianjia/xianjiasitemap.git

https://packagist.org/packages/submit



suxianjia/xianjiasitemap

composer require suxianjia/xianjiasitemap


composer update 命令 Ok;

最后执行 composer dumpautoload -o 让自动加载生效。




打包 
判断时间格式 是时间戳 还是 时间字符串

yx-dev@Mac xianjiasitemap % git tag           
v1.0
v1.0.1
v1.0.2
v1.0.3
v1.0.4
v1.0.5
v1.0.6
v1.0.7
v1.0.8
v1.0.9
v1.1.0
v1.1.1
v1.1.2
v1.1.3
v1.1.4
v1.1.5
v1.1.6
yx-dev@Mac xianjiasitemap %   git tag -a v1.1.7 -m "判断时间格式 是时间戳 还是 时间字符串" 
yx-dev@Mac xianjiasitemap % git push origin tag v1.1.7 
Enumerating objects: 1, done.
Counting objects: 100% (1/1), done.
Writing objects: 100% (1/1), 209 bytes | 209.00 KiB/s, done.
Total 1 (delta 0), reused 0 (delta 0), pack-reused 0
To github.com:suxianjia/xianjiasitemap.git
 * [new tag]         v1.1.7 -> v1.1.7
yx-dev@Mac xianjiasitemap % 
git tag -a v1.1.8 -m " Replace \{\{id\}\} with $id" 

https://packagist.org/packages/submit
https://packagist.org/packages/suxianjia/xianjiasitemap

https://github.com/suxianjia/xianjiasitemap/releases/new

php82 composer-php82.phar update

```
