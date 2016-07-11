<?php
header("Content-type: text/html; charset=utf-8");
//正则
大写字母分割：preg_split('/(?=[A-Z])/', $a)
//保留两位小数
$number = sprintf("%1\$.2f",$number);
$num = sprintf("%.2f",$num);
//时间戳转为日期
js: new Date(parseInt('time') * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, "")
php: date('Y-m-d H:i:s','time')
//写入文件内容
      $fp = fopen($_SERVER ['DOCUMENT_ROOT']."/aa.txt","a+");
      fwrite($fp,$aa."\r\n");
      fclose($fp);  
//去掉BOM头字符串    
$aaa = str_replace(urldecode('%EF%BB%BF'), '', $aaaa);
//连续多个空格替换成一个
preg_replace ( "/\s(?=\s)/","\\1", $v )
//去掉字符串最后一位
substr($str,0,strlen($str)-1);
//判断一个字符串是否包含另一个字符串
strpos($a, $b) !== false 如果$a 中存在 $b，则为 true ，否则为 false
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