


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
 * @return [type]	  [description]
 */
function arrToObj($arr) {
	if (!is_array($arr)) return $arr;
	$obj = new stdClass();
	if (is_array($arr) && count($arr) > 0) {
		foreach ($arr as $k => $v) {
			$k = strtolower(trim($k));
			if (!empty($k)) $obj->$k = arrToObj($v);
		}
		return $obj;
	} else {
		return false;
	}
}
/**
 * [array_depth description]
 * @param  [type] $arr [description]
 * @return [type]        [description]
 */
function array_depth($arr) {
	if(!is_array($arr)) return 0;
	$max = 1;
	foreach($arr as $v){
		if(is_array($v)){
			$depth = array_depth($v)+1;
			if($depth>$max) $max = $depth;
		}
	}
	return $max;
}
/**
 * [array_2sort description]
 * @param  [type] $arr    [description]
 * @param  [type] $column [description]
 * @param  string $sort   [description]
 * @return [type]         [description]
 */
function array_2sort($arr,$column,$sort='asc'){
  if(!is_array($arr)) return $arr;
  $vol = array();
  foreach ($arr as $k => $v) {
      $vol[$k]  = $v[$column];
  }
  if($sort=='desc') array_multisort($vol, SORT_DESC, $arr);
  else array_multisort($vol, SORT_ASC, $arr);
  return $arr;
}

?>
```