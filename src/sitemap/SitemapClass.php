<?php

namespace Suxianjia\Xianjiasitemap\sitemap;
use think\facade\Db as thinkDb;

date_default_timezone_set('PRC');
require __DIR__ . '/../fun.php';
class SitemapClass
{
    /**
     * @var mixed
     */
    private static $config;

    private static $args;
    public static function init(array $args = []) : SitemapClass{
        self::$args = $args;
        return new self;
    }


    public static function set_config(array $array = []): SitemapClass
    {
        self::$config = ConfigClass::getInstance()::setConfig($array)::getConfig();
        return new self;
    }

    public static function get_config( ):array
    {
        return self::$config;
    }

    public static function generate( string $type = 'xml') :array|string {
        $res = [];
        switch ($type) {
            case 'xml':
                $res = self::generate_xml() ;
                break;
            case 'txt':
                $res = self::generate_txt() ;
                break;
            case 'html':
                $res = self::generate_html() ;
                break;

            default:
        }
        return $res ;
    }






//=  sitemap.xml



    public static function generate_xml() :array|string {
        $config = self::get_config();//_config();
        //Begin stopwatch for statistics
        $start = microtime(true);
        try {
//Setup file stream
            $tempfile =   $config['file_dir'] . $config['file_xml'];//'sitemap.xml';
//Default html header makes browsers ignore \n
            header("Content-Type: text/plain");
            $file_stream = fopen($tempfile, "w") or die("Error: Could not create temporary file $tempfile" . "\n");
            fwrite($file_stream, $config['xmlheader']);
            $map_row = "\n<url>\n";
            $map_row .= "   <loc>". $config['site'] .'/' ."</loc>\n";
            $map_row .= "   <changefreq>". $config['changefreq']  ."</changefreq>\n";
            $map_row .= "   <priority>". $config['priority']  ."</priority>\n";
            $map_row .= "   <lastmod>". $config['lastmod']  ."</lastmod>\n";
            $map_row .= "</url>\n";
            fwrite($file_stream, $map_row);
            $map_row = "";
            $index   = 0;
            $db = \Suxianjia\Xianjiasitemap\orm\db::getInstance($config);
            foreach ( $config['scan_url_list'] AS $key => $item ) {
                $url = rtrim($item['loc'], '*')  ;
                $url =   $config['site'].$url;
                $page = 1;
                $res_data = $db::getdata($page,$item ['listRows'],$item ['field'], $item ['where'],$item ['tablename'] ,$item ['key']);
                foreach ( $res_data as $v ) {
                    $index++;
                    $urls[$index] =    $url.$v[ $item ['key']  ];
                    $map_row = "<url>\n";
                    $map_row .= "    <loc>".  $urls[$index]  ."</loc>\n";
                    $map_row .= "    <lastmod>". $item['lastmod']  ."</lastmod>\n";
                    $map_row .= "    <changefreq>". $item['changefreq']  ."</changefreq>\n";
                    $map_row .= "    <priority>". $item['priority']  ."</priority>\n";
                    $map_row .= "</url>\n";
                    fwrite($file_stream, $map_row);
                }
            }
            // Finalize sitemap
            fwrite($file_stream, "</urlset>\n");
            fclose($file_stream);
            // Apply permissions
            chmod($tempfile,  $config['permissions'] );
        }catch (\Exception $e){
            return ['error' => $e->getMessage() ];
        }
        return [ 'tempfile'=> $tempfile , 'index' => $index,  "time:" => date('Y-m-d H:i:s', time())] ;
    }








// urllist.txt
    public static function generate_txt() :array|string {
        $config = self::get_config();//_config();
        //Begin stopwatch for statistics
        $start = microtime(true);
        try {
//Setup file stream
            $tempfile =   $config['file_dir'] . $config['file_txt'];//urllist.txt
//Default html header makes browsers ignore \n
            header("Content-Type: text/plain");
            $file_stream = fopen($tempfile, "w") or die("Error: Could not create temporary file $tempfile" . "\n");

            $map_row = "";
            $map_row .= "". $config['site'] .'/' ."\n";

            fwrite($file_stream, $map_row);
            $map_row = "";
            $index   = 0;
            $db = \Suxianjia\Xianjiasitemap\orm\db::getInstance($config);
            foreach ( $config['scan_url_list'] AS $key => $item ) {
                $url = rtrim($item['loc'], '*')  ;
                $url =   $config['site'].$url;
                $page = 1;
                $res_data = $db::getdata($page,$item ['listRows'],$item ['field'],$item ['where'], $item ['tablename'] ,$item ['key']);
                foreach ( $res_data as $v ) {
                    $index++;
                    $urls[$index] =    $url.$v[ $item ['key']  ];
                    $map_row = " ";
                    $map_row .= " ".  $urls[$index]  ."\n";

                    fwrite($file_stream, $map_row);
                }
            }
            // Finalize sitemap

            fclose($file_stream);
            // Apply permissions
            chmod($tempfile,  $config['permissions'] );
        }catch (\Exception $e){
            return ['error' => $e->getMessage() ];
        }
        return [ 'tempfile'=> $tempfile , 'index' => $index,  "time:" => date('Y-m-d H:i:s', time())] ;
    }
// ------   $res = self::generate_html() ;

public static function generate_html() :array|string{
    $config = self::get_config();//_config();
    //Begin stopwatch for statistics
    $start = microtime(true);
    try {
//Setup file stream
        $tempfile =   $config['file_dir'] . $config['file_html'];//urllist.txt
//Default html header makes browsers ignore \n
        header("Content-Type: text/plain");
        $file_stream = fopen($tempfile, "w") or die("Error: Could not create temporary file $tempfile" . "\n");

        $map_row = "<!doctype html>
<html lang=\"en\">
<head>
<title> Site Map  Page 1 - created with PRO Sitemap Service -  ".$config['site']."</title>
<meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<script type=\"text/javascript\">
function el_t(el,cl){if(el)el.classList.toggle(cl);}
window.addEventListener('load', (event) => {
let alh = document.getElementsByClassName('lhead');
for (let lh of alh) {
lh.addEventListener('click', function (event) {
el_t(this,'collapse');
el_t(this.nextElementSibling,'hide');
el_t(this.nextElementSibling.nextElementSibling,'hide');
});
}
});

</script>
<style type=\"text/css\">
body {
background-color: #fff;
font-family: \"Arial Narrow\", \"Helvetica\", \"Arial\", sans-serif;
margin: 0;
}

.hide {
display: none;
}
.collapse {
text-decoration-style: dashed;
text-decoration-line: underline;
}
#top {

background-color: #b1d1e8;
font-size: 16px;
padding-bottom: 40px;
}

nav {
font-size: 24px;

margin: 0px 30px 0px;
border-bottom-left-radius: 6px;
border-bottom-right-radius: 6px;
background-color: #f3f3f3;
color: #666;
box-shadow: 0 10px 20px -12px rgba(0, 0, 0, 0.42), 0 3px 20px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
padding: 10px 0;
text-align: center;
z-index: 1;
}

h3 {
margin: auto;
padding: 10px;
max-width: 600px;
color: #666;
}

h3 span {
float: right;
}

h3 a {
font-weight: normal;
display: block;
}


#cont {
font-size: 18px;
position: relative;
border-radius: 6px;
box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

background: #f3f3f3;

margin: -20px 30px 0px 30px;
padding: 20px;
}
small {
color: #666;
}

a:link,
a:visited {
color: #0180AF;
text-decoration: underline;
}

a:hover {
color: #666;
}


#footer {
padding: 10px;
text-align: center;
}

ul {
margin: 0px;
padding: 0px;
list-style: none;
}

ul.ultree {
border: #ccc 1px solid;
border-radius: 4px;
border-bottom: none;
}

li {
margin: 0px;
}

li ul {
margin-left: 20px;
}

li.lhead {
background: #ddd;
color: #666;
padding: 5px;
margin: 0px;
cursor: pointer;
}
li.lhead:hover,
.pager a:hover
{
background: #ccc;
}
.lcount {
padding: 0px 10px;
}

.lpage {
/*border-bottom: #ddd 1px solid;*/
padding: 5px;
}

.last-page {
border: none;
}

.pager {
text-align: center;
}

.pager a,
.pager span {
padding: 10px;
margin: 2px;
background: #fff;
border-radius: 10px;
display: inline-block;
}
.pager span {
border: #ccc 1px solid;
}
</style>
</head>
<body>
<div id=\"top\">
<nav>
".$config['site']." HTML Site Map</nav>
<h3>

<a href=\"".$config['site'] ."\">".$config['site']." Homepage</a>
</h3></div>
<div id=\"cont\">
<ul class=\"ultree level-1 has-pages\">
<li class=\"lhead\" title=\"Click to toggle\">".$config['site']." </li>
<li class=\"lpagelist\">
<ul class=\"ulpages\"> \n";
        fwrite($file_stream, $map_row);
        $map_row ="";
        $index   = 0;
        $db = \Suxianjia\Xianjiasitemap\orm\db::getInstance($config);
        foreach ( $config['scan_url_list'] AS $key => $item ) {
            $url = rtrim($item['loc'], '*')  ;
            $url =   $config['site'].$url;
            $page = 1;
            $res_data = $db::getdata($page,$item ['listRows'],$item ['field'],$item ['where'], $item ['tablename'] ,$item ['key']);
            foreach ( $res_data as $v ) {
                $index++;
                $urls[$index] =    $url.$v[ $item ['key']  ];
                $map_row = " ";
                $map_row .= "<li class=\"lpage\">  <a href=\"".$urls[$index] ." \" title=\"". $v ['title']." \">".$urls[$index] ."</a> </li>\n";
                fwrite($file_stream, $map_row);
            }
        }








        $map_row =" <li class=\"lhead\" title=\"Click to toggle\">".$config['site']."<span class=\"lcount\">".$index."  page</span></li>
</ul>
</li>
</ul>
</div>
<div id=\"footer\">

<span>Last updated: " . date("Y-m-d H:i:s" , time())  . "<br />
Total pages: ".$index."</span>

Page created with ".$config['site']." - <a href=\"".$config['site']."\"> Sitemap Service</a>
</div>
</body>
</html>";
//        $map_row .= "". $config['site'] .'/' ."\n";

        fwrite($file_stream, $map_row);
        $map_row =" ";

        // Finalize sitemap

        fclose($file_stream);
        // Apply permissions
        chmod($tempfile,  $config['permissions'] );
    }catch (\Exception $e){
        return ['error' => $e->getMessage() ];
    }
    return [ 'tempfile'=> $tempfile , 'index' => $index,  "time:" => date('Y-m-d H:i:s', time())] ;
}


//------
}