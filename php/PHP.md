# PHP

```
<?php
header("Content-type: text/html; charset=utf-8");
//正则
大写字母分割：preg_split('/(?=[A-Z])/', $a)
//保留两位小数
$number = sprintf("%1\$.2f",$number);
$num = sprintf("%.2f",$num);
//前补0
sprintf("%04d", 1);//生成4位数，不足前面补0 
sprintf("%04s", '1');//生成4位字符串，不足前面补0 
//like sprintf %%
sprintf(" AND (name like '%%%1\$s%%' OR province like '%%%1\$s%%')",$params['searchStr'])
//时间戳转为日期
js: new Date(parseInt('time') * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, "")
php: date('Y-m-d H:i:s','time')
//设置时区
date_default_timezone_set('Asia/Shanghai');
ini_set('date.timezone','Asia/Shanghai');

//写入文件内容
      $fp = fopen($_SERVER ['DOCUMENT_ROOT']."/aa.txt","a+");
      fwrite($fp,$aa."\r\n");
      fclose($fp); 
//逐行读取文件内容
      $handle = @fopen("/var/aa.txt", "r");
      if ($handle) {
          while (!feof($handle)) {
              $buffer = fgets($handle, 4096);
          }
          fclose($handle);
      }
//去掉BOM头字符串    
$aaa = str_replace(urldecode('%EF%BB%BF'), '', $aaaa);
//连续多个空格替换成一个
preg_replace ( "/\s(?=\s)/","\\1", $v )
//去掉字符串最后一位
substr($str,0,strlen($str)-1);
//判断一个字符串是否包含另一个字符串
strpos($a, $b) !== false 如果$a 中存在 $b，则为 true ，否则为 false

urlencode(iconv("gbk","utf-8","基本资料进度");//把中文gbk编码转为utf8

iconv("utf-8","gbk",urldecode('%BB%F9%B1%BE%D7%CA%C1%CF%BD%F8%B6%C8'));

$aaa = preg_match('/^[\x{4e00}-\x{9fa5}\w\s-#()（）]{1,60}+$/u',$_REQUEST['a']);

sprintf("---%1\$s---%1\$s---%1\$s---","YY");

* 通过设置服务器的环境变量，来区分开发/测试/生成环境。
  Apache命令：SetEnv RUN_MODE development
  Nginx命令：fastcgi_param RUN_MODE development;
  PHP获取环境变量 $runMode = $_SERVER['RUN_MODE'];

//不固定参数方法
function myfun() {  
  $numargs = func_num_args();  
  echo "参数个数: $numargs\n";  
  $args = func_get_args();//获得传入的所有参数的数组  
  var_export($args);  
} 

//异常
try {
  throw new Exception("XXX");
} catch (Exception $e) {
  echo $e->getMessage();
}

binoct();//转为八进制
bindec();//转为十进制
binhex();//转为十六进制

* GB2312
* GBK编码范围：8140－FEFE，剔除xx7F码位，共23940个码位
  * 汉字区。包括：
    * GB 2312 汉字区。即 GBK/2: B0A1-F7FE。收录 GB 2312 汉字 6763 个，按原顺序排列。
    * GB 13000.1 扩充汉字区。包括：
      * GBK/3: 8140-A0FE。收录 GB 13000.1 中的 CJK 汉字 6080 个。
      * GBK/4: AA40-FEA0。收录 CJK 汉字和增补的汉字 8160 个。CJK 汉字在前，按 UCS 代码大小排列；增补的汉字（包括部首和构件）在后，按《康熙字典》的页码/字位排列。
      * 汉字“〇”安排在图形符号区GBK/5：A996。
  * 图形符号区。包括：
    * GB 2312 非汉字符号区。即 GBK/1: A1A1-A9FE。其中除 GB 2312 的符号外，还有 10 个小写罗马数字和 GB 12345 增补的符号。计符号 717 个。
    * GB 13000.1 扩充非汉字区。即 GBK/5: A840-A9A0。BIG-5 非汉字符号、结构符和“〇”排列在此区。计符号 166 个。
* 用户自定义区：分为三个小区。
  * AAA1-AFFE，码位 564 个。
  * F8A1-FEFE，码位 658 个。
  * A140-A7A0，码位 672 个。尽管对用户开放，但限制使用，因为不排除未来在此区域增补新字符的可能性。

\uxxxx这种格式是Unicode写法，表示一个字符，其中xxxx表示一个16进制数字，范围所0～65535.

//二维数组排序

  foreach ($card_list as $k => $v) {
      $volume[$k]  = $v['start_time'];
  }
  array_multisort($volume, SORT_DESC, $card_list);
/**
 * [guid 生成不重复的随机字符串]
 * @return [type] [description]
 */
function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}
/**
 * [get_time 获取远程服务器时间戳]
 * @param  [type] $host [host]
 * @param  [type] $port [port]
 * @return [type]       [timestamp]
 */
function get_time($host,$port){
    $data  = "HEAD / HTTP/1.1\r\n";
    $data .= "Host: $host\r\n";
    $data .= "Connection: Close\r\n\r\n";
    $fp = fsockopen($host, $port);
    fputs($fp, $data);
    $resp = '';
    while ($fp && !feof($fp))
        $resp .= fread($fp, 1024);
    preg_match('/^Date: (.*)$/mi',$resp,$matches);
    return strtotime($matches[1]);
}
//php 获取ip
function get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    }
    return $ip;
}
//post方法发送参数
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $PostArray);
        $aa = curl_exec($ch);
        curl_close($ch); 
//get方法发送参数
　　$ch = curl_init();
　　curl_setopt($ch, CURLOPT_URL, $url.'?'.http_build_query($PostArray));
　　curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
　　curl_setopt($ch, CURLOPT_HEADER, 0);
　　$aa = curl_exec($ch);
　　curl_close($ch);

		$aa = file_get_contents($url.'?'.http_build_query($PostArray));

//输出硬盘数据
  $test = "df -hl";
  exec($test,$array);
  echo json_encode($array);

//打印执行时间和占用内存
function microtime_float()
{
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
class test{
    static $start_time;
    static $end_time;
    static $start_memory;
    static $end_memory;
     
    public static function start()
    {
        self::$start_memory = memory_get_usage();
        self::$start_time = microtime_float();
        echo '<br/>Start @'.self::$start_time.'('.self::$start_memory.')|------->';
    }
     
    public static function end()
    {
        self::$end_time = microtime_float();
        self::$end_memory = memory_get_usage();
        echo 'End @'.self::$end_time.'('.self::$end_memory.') :';
        echo '|======= 共耗时：'.(self::$end_time-self::$start_time).'，共用内存：'.(self::$end_memory-self::$start_memory);
    }
}




//批量修改数据库表名前缀
    public function tt(){
      $old_prefix='mygame_';//数据库的前缀
      $new_prefix='mobile_';//数据库的前缀修改为
          $dbname = '56775_mobile_main';
          $result = mysql_list_tables($dbname);
      while ($row = mysql_fetch_row($result)) {
        $data[] = $row[0];
      }
      foreach($data as $k => $v){
        $preg = preg_match("/^($old_prefix{1})([a-zA-Z0-9_-]+)/i", $v, $v1);
        if($preg){
          $tab_name[$k] = $v1[2];
          //$tab_name[$k] = str_replace($old_prefix, '', $v);
        }

      }
      //批量重命名
      foreach($tab_name as $k => $v)
      {
        $sql = 'RENAME TABLE `'.$old_prefix.$v.'` TO `'.$new_prefix.$v.'`;';
        echo($sql."<br>");
      }
    }



    
?>


        <div class="btn_ks">
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="340" height="214">
            <param name="movie" value="/Tpl/Template_jstm/images/ks.swf" />
            <param name="quality" value="high" />
            <param name="wmode" value="transparent" />
            <param name="swfversion" value="11.0.0.0" />
            <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
            <param name="expressinstall" value="/Tpl/Template_jstm/images/expressInstall.swf" />
            <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 --> 
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="/Tpl/Template_jstm/images/ks.swf" width="340" height="214">
              <!--<![endif]-->
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="11.0.0.0" />
              <param name="expressinstall" value="/Tpl/Template_jstm/images/expressInstall.swf" />
              <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
              <div>
                <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
                <p><a href="http://www.adobe.com/go/getflashplayer"><img src="/Tpl/Template_jstm/images/get_flash_player.gif" alt="获取 Adobe Flash Player" width="112" height="33" /></a></p>
              </div>
              <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
          </object>
        </div>

<!--uc_center-->
<?php define('UC_CONNECT', 'mysql');
define('UC_DBHOST', 'localhost:3306');
define('UC_DBUSER', 'root');
define('UC_DBPW', '123456');
define('UC_DBNAME', '51wan_uc');
define('UC_DBCHARSET', 'utf8');
define('UC_DBTABLEPRE', '`51wan_uc`.uc_');
define('UC_DBCONNECT', '0');
define('UC_KEY', 'asdjkdjlkskjdsjklsk;j34903ojklasd;ksoidsfldskfjaj;kasodooo');
define('UC_API', 'http://bbs.51wan.la/uc_server');
define('UC_CHARSET', 'utf-8');
define('UC_IP', '');
define('UC_APPID', '2');
define('UC_PPP', '20');
?>


discuz authcode加密



<!--sql的类方法-->
<?php
  require dirname(__FILE__).'/../../sys/dbinfo.php';
  define('DBHOST',$C_ServerName);
  define('DBUSER',$C_Username);
  define('DBPWD',$C_Password);
  define('DBNAME', $C_Database);
  define('DBSETNAMES','SET NAMES UTF8');
  define('DBPREFIX', 'zsg_');
  
  function mysql_get_result($sql){
    mysql_connect(DBHOST,DBUSER,DBPWD);
    mysql_select_db(DBNAME);
    mysql_query(DBSETNAMES);
    $_result = mysql_query($sql);
    if(!$_result) return false;
    $result = array();
    while($row  = mysql_fetch_assoc($_result))
      $result[] = $row;
    return $result;
  }
  
  function mysql_update_result($sql){
    mysql_connect(DBHOST,DBUSER,DBPWD);
    mysql_select_db(DBNAME);
    mysql_query(DBSETNAMES);
    $_result = mysql_query($sql);
    if(!$_result) return false;
    return $true;
  }
?>
```

1.基本的判断函数

    is_dir — 判断给定文件名是否是一个目录

    is_file — 判断给定文件名是否为一个文件

    is_executable — 判断给定文件名是否可执行

    is_link — 判断给定文件名是否为一个符号连接

    is_readable — 判断给定文件名是否可读

    is_uploaded_file — 判断文件是否是通过 HTTP POST 上传的

    is_writable — 判断给定的文件名是否可写

    is_writeable — is_writable 的别名

2.文件相关信息获取

    file_exists — 检查文件或目录是否存在

    fileatime — 取得文件的上次访问时间

    filectime — 取得文件的 inode 修改时间

    filegroup — 取得文件的组

    fileinode — 取得文件的 inode

    filemtime — 取得文件修改时间

    fileowner — 取得文件的所有者

    fileperms — 取得文件的权限

    filesize — 取得文件大小

    filetype — 取得文件类型

 3.文件路径相关函数

相对路径：相对于当前目录的上级和下级目录

    . 当前目录
    .. 上一级目录

路径分隔符号

    linux/Unix “/”
    windows “\”
    不管是什么操作系统PHP的目录分割符号都支技 / (Linux)

绝对路径：可以指的操作系统的根，也可以指的是存放网站的文档根目录

    如果是在服务器中执行（通过PHP文件处理函数执行）路径 则 “根”指的就是操作系统的根
    如果程序是下载的客户端，再访问服务器中的文件时，只有通过Apache访问，“根”也就指的是文档根目录

三个相关函数

    basename — 返回路径中的文件名部分

    dirname — 返回路径中的目录部分

    pathinfo — 返回文件路径的信息 Array ( [dirname] => ../www/yyy [basename] => login.rar [extension] => rar [filename] => login )

4. 文件的创建删除修改

    touch — 创建一个文件

    unlink — 删除文件

    rename — 重命名一个文件或目录

    copy — 拷贝文件

例如下面的例子
  touch("./php.apahce"); //创建文件
  unlink("C:/AppServ/www/xsphp/apache.php");  //删除文件
  rename("./test.txt", "d:/test2.txt");    //重命名文件
  copy("cache.txt", "./cache5.txt");   //复制文件
  chmod("a.txt",755);   //设置文件权限

权限相关内容

    rwx 表这个文件的拥有者 r读 w写 x执行
    rwx 表这个文件的拥有者所在的组 r读 w写 x执行
    rwx 其它用户对这个为文件的权限 r读 w写 x执行

文件读写
1. file_get_contents(string)

传入文件名，直接得到文件中的文本信息，返回的内容即为文件中的文本。

例如
<?php
 $str = file_get_contents("1.txt");
 echo $str;
 ?>

则直接打开了 1.txt 文件中的内容，并返回文件中的文本信息。

如果文件不存在，那么会提示

    Warning: file_get_contents(2.txt): failed to open stream: No such file or directory

同样，文件还可以是远程文件，例如，参数传入 http://www.qq.com

即可以呈现腾讯网的首页内容。

缺点：不能读取指定部分的内容，一次性全部读取。
2. file_put_contents(filename,content)

写入文件，filename是写入文件的文件名，content是写入内容，返回值是成功写入的字符长度。
<?php 
 echo file_put_contents("2.txt",'abcd');
?>

2.txt 文件如果不存在，那么则会创建这个文件并写入 abcd 这个字符串，返回 4 ，为字符串的长度。 如果文件存在，则会将文件清空，然后写入字符串，返回写入长度。

缺点：不能以追加的方式写入文件。
3.file(filename)

file是直接打开某一个文件，返回的结果是一个数组，每一行是数组的一个元素。也就是说，获取行数只需要输出数组的大小即可。例如
<?php 
 $str = file("1.txt");
 var_dump($str);
 echo count($str);
?>

即可得到数组形式的行内容，而且输出了行数。

缺点：不能读取指定部分的内容。
4.fopen(filename,mode)

filename是文件名，可以是路径加名，也可以是远程服务器文件。

mode是打开文件的方式

    r，以只读模式打开文件
    r+，除了读，还可以写入。
    w， 以只写的方式打开，如果文件不存在，则创建这个文件,并写放内容，如果文件存在，并原来有内容，则会清除原文件中所有内容，再写入（打开已有的重要文件）
    w+，除了可以写用fwrite, 还可以读fread
    a，以只写的方式打开，如果文件不存在，则创建这个文件，并写放内容，如果文件存在，并原来有内容，则不清除原有文件内容，再原有文件内容的最后写入新内容，（追加）
    a+，除了可以写用fwrite, 还可以读fread
    b，以二进制模式打开文件（图，电影）
    t，以文本模式打开文件

注意：

    r+具有读写属性，从文件头开始写，保留原文件中没有被覆盖的内容；

    w+具有读写属性，写的时候如果文件存在，会被清空，从头开始写。

返回的是一个文件资源
5.fwrite(file,content)

文件写入功能，file是文件资源，用fopen函数获取来的，content是写入内容。同 fputs 函数。

例如
<?php 
 $file = fopen("1.txt","r+");
 $result = fwrite($file,"xx");
 if($result){
 echo "Success";
 }else
 echo "Failed";
 }
?>

则从头开始写入资源，即把前两个字符设为 xx
6. fread(file,size)

读取文件指定部分的长度，file是文件资源，由fopen返回的对象，size是读取字符的长度。

例如
<?php 
 $file = fopen("1.txt","r");
 $content = fread($file,filesize("1.txt"));
 echo $content;
?>

不过，上述的 filesize 方法只能获取本地文件大小，对于远程文件的读取就要换一种方法了。

例如
<?php 
 $file = fopen("http://www.qq.com","r");
 $str = "";
 while(!feof($file)){  //判断时候到了文件结尾
 $str.=fread($file,1024);
 }
 echo $str;
?>

7.fgets(file)

file是文件资源，每次读取一行。例如我们读取出腾讯首页一共有多少行。
 <?php 
 $file = fopen("http://www.qq.com","r");
 $str = "";
 $count = 0;
 while(!feof($file)){
 $str .= fgets($file);
 $count ++;
 }
 echo $count;
?>

会输出结果 8893，我们可以查看源文件，看看它一共有多少行，验证一下即可。
7.fgetc(file)

与fgets方法很相似，file是文件资源，每次读取个字符。例如我们读取出腾讯首页一共有多少个字符。
<?php 
 $file = fopen("http://www.qq.com","r");
 $str = "";
 $count = 0;
 while(!feof($file)){
 $str .= fgetc($file);
 $count ++;
 }
 echo $count;
?>

上述代码便会输出所有的字符数量。
8.ftell(file)

ftell 是返回当前读文件的指针位置，file 是文件资源，是由 fopen 返回的对象。
9.fseek(file,offset,whence)

file

文件系统指针，是典型地由 fopen() 创建的 resource(资源)。

offset

偏移量。

要移动到文件尾之前的位置，需要给 offset 传递一个负值，并设置 whence 为 SEEK_END。

whence

    SEEK_SET – 设定位置等于 offset 字节。

    SEEK_CUR – 设定位置为当前位置加上 offset。

    SEEK_END – 设定位置为文件尾加上 offset。

10.rewind($file)

回到文件头部，file是文件资源

例如
<?php 
 $file = fopen("1.txt","r");
 echo ftell($file)."<br>"; //输出读取前的指针位置
 echo fread($file,10)."<br>"; //读取10个字符，指针移动10个单位
 echo ftell($file)."<br>"; //输出读取完之后当前指针位置
 fseek($file,20,SEEK_CUR); //当前指针前移20单位
 echo ftell($file)."<br>"; //输出移动之后指针的位置
 echo fread($file,10)."<br>"; //输出读取的10个字符
 echo ftell($file)."<br>"; //输出读完10个字符之后指针的位置
 fseek($file,-20,SEEK_END); //指针移动到文件末尾前20个字符
 echo ftell($file)."<br>"; //输出移动之后指针的位置
 echo fread($file,10)."<br>"; //输出文件末尾20个字符
 echo ftell($file)."<br>"; //输出读完10个字符之后指针的位置
 rewind($file); //回到文件头部
 echo ftell($file)."<br>"; //输出移动之后指针的位置
?>

11.flock(file,operation[,wouldblock])

file

文件资源指针，是典型地由 fopen() 创建的 resource(资源)。

operation

operation 可以是以下值之一：

    LOCK_SH取得共享锁定（读取的程序）。

    LOCK_EX 取得独占锁定（写入的程序。

    LOCK_UN 释放锁定（无论共享或独占）。

如果不希望 flock() 在锁定时堵塞，则是 LOCK_NB（Windows 上还不支持）。

wouldblock

如果锁定会堵塞的话（EWOULDBLOCK 错误码情况下），可选的第三个参数会被设置为 TRUE。（Windows 上不支持）

例如
<?php 
 $file = fopen("1.txt","a");
 if(flock($file,LOCK_EX)){
 fwrite($file,"xxx");
 flock($file,LOCK_UN);
 }
?>


