<?php
//常用的功能函数


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
function arrToObj($arr){
	if(is_array($arr)){
		$obj = new stdClass();
		foreach ($arr as $k => $v) {
			$k = strtolower(trim($k));
			if (!empty($k)) $obj->$k = arrToObj($v);
		}
		return $obj;
	}
	return $arr;
}
/**
 * [objToArr description]
 * @param  [type] $obj [description]
 * @return [type]      [description]
 */
function objToArr($obj){
	if (is_object($obj)){
		$arr = array();
		foreach ($obj as $k => $v) $arr[$k] = objToArr($v);
		return $arr;
	}
	return $obj;
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
/**
 * [batchInsert description]
 * @param  [type]  $table  [description]
 * @param  [type]  $arrays [description]
 * @param  integer $limit  [description]
 * @return [type]          [description]
 */
function batchInsert($table,$arrays,$limit=500){
	if(empty($arrays) || empty($table)) return false;
	$columnStr = "";
	$valueStr = "";
	$curNum = 0;
	//$model = new Model();
	foreach ($arrays as $array){
		if(""===$columnStr){
			$valueStr .= "(";
			foreach ($array as $c=>$v){
				//$v = mysql_real_escape_string($v);
				if(""===$columnStr){
					$columnStr = $c;
					$valueStr .= is_string($v)?sprintf("'%s'",$v):$v;
				}else{
					$columnStr .= ",".$c;
					$valueStr .= ",".(is_string($v)?sprintf("'%s'",$v):$v);
				}
			}
			$valueStr .= ")";
		}else{
			$valueStr .= ",(";
			$i = 0;
			foreach ($array as $v){
				//$v = mysql_real_escape_string($v);
				if($i == 0){
					$valueStr .= is_string($v)?sprintf("'%s'",$v):$v;
				}else{
					$valueStr .= ",".(is_string($v)?sprintf("'%s'",$v):$v);
				}
				$i++;
			}
			$valueStr .= ")";
		}
		if($limit > 0){
			$curNum++;
			if($curNum > $limit){
				$sql = sprintf("INSERT IGNORE INTO %s(%s) VALUES %s",$table,$columnStr,$valueStr);
				//$model->execute($sql);
				$columnStr = "";
				$valueStr = "";
				$curNum = 0;
				echo(sprintf("%s\r\n",$sql));
			}
		}
	}
	if(""!==$columnStr){
		$sql = sprintf("INSERT IGNORE INTO %s(%s) VALUES %s",$table,$columnStr,$valueStr);
		//$model->execute($sql);
		echo(sprintf("%s\r\n",$sql));
	}
}