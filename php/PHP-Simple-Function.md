##PHP函数


###字节转换（KB MB GB TB PB） 

    function _format_bytes($a_bytes)
    {
        if ($a_bytes < 1024) {
            return $a_bytes .' B';
        } elseif ($a_bytes < 1048576) {
            return round($a_bytes / 1024, 2) .' KiB';
        } elseif ($a_bytes < 1073741824) {
            return round($a_bytes / 1048576, 2) . ' MiB';
        } elseif ($a_bytes < 1099511627776) {
            return round($a_bytes / 1073741824, 2) . ' GiB';
        } elseif ($a_bytes < 1125899906842624) {
            return round($a_bytes / 1099511627776, 2) .' TiB';
        } elseif ($a_bytes < 1152921504606846976) {
            return round($a_bytes / 1125899906842624, 2) .' PiB';
        } elseif ($a_bytes < 1180591620717411303424) {
            return round($a_bytes / 1152921504606846976, 2) .' EiB';
        } elseif ($a_bytes < 1208925819614629174706176) {
            return round($a_bytes / 1180591620717411303424, 2) .' ZiB';
        } else {
            return round($a_bytes / 1208925819614629174706176, 2) .' YiB';
        }
    }

###按字符串长度分割成数组,支持中文

    /**
     
     * 将unicode字符串按传入长度分割成数组
     
     * @param  string  $str 传入字符串
     
     * @param  integer $l   字符串长度
     
     * @return mixed      数组或false
     
     */
     
    function str_split_unicode($str, $l = 0) {
     
        if ($l > 0) {
     
            $ret = array();
     
            $len = mb_strlen($str, "UTF-8");
     
            for ($i = 0; $i < $len; $i += $l) {
     
                $ret[] = mb_substr($str, $i, $l, "UTF-8");
     
            }
     
            return $ret;
     
        }
     
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
     
    }