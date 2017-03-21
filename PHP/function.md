


```
<?php
function microtime_float(){
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}
function secsToStr($secs,$format="") {
  if($secs>=86400){$days=floor($secs/86400);$secs=$secs%86400;$r=$days.' day';if($days>1){$r.='s';}if($secs>0){$r.=', ';}}
  if($secs>=3600){$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.' hour';if($hours>1){$r.='s';}if($secs>0){$r.=', ';}}
  if($secs>=60){$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.' minute';if($minutes>1){$r.='s';}if($secs>0){$r.=', ';}}
  $r.=$secs.' second';if($secs>1){$r.='s';}
  return $r;
}
/**
 * [arrToObj description]
 * @param  [type] $arr [description]
 * @return [type]      [description]
 */
function arrToObj($arr){
  if(!is_array($arr)) return $arr;
  $obj = new stdClass();
  if(is_array($arr) && count($arr)>0){
      foreach ($arr as $k => $v) {
          $k = strtolower(trim($k));
          if(!empty($k)) $obj->$k = arrToObj($v);
      }
      return $obj;
  }else{
    return false;
  }
}
?>
```