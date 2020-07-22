<?php
	/**
	* @param $data 操作的数组
	* @param string $fieldPri 唯一键名，如果是表则是表的主键
	* @param string $fieldPid 父ID键名
	* @param int $pid 一级PID的值
	* @param string $sid 子ID用于获得指定指ID的所有父ID
	* @param int $type 操作方式1=>返回多维数组,2=>返回一维数组,3=>得到指定子ID(参数$sid)的所有父
	* @param string $html 名称前缀，用于在视图中显示层次感的列表
	* @param int $level 不需要传参数（执行时调用）
	* @return array
	*/
    private function channel($data, $fieldPri = 'id', $fieldPid = 'pid', $pid = 0, $sid = null, $type = 1, $html = " ", $level = 1)
    {
        if (!$data) {
            return array();
        }
        switch ($type) {
            case 1:
                $arr = array();
                $i = 0;
                foreach ($data as $v) {
                    if ($v[$fieldPid] == $pid) {
                        $arr[$i] = $v;
                        $arr[$i]['html'] = str_repeat($html, $level - 1);
                        $arr[$i]["children"] = self::channel($data, $fieldPri, $fieldPid, $v[$fieldPri], $sid, $type, $html, $level + 1);
                        $i++;
                        // $arr[$v[$fieldPri]]['open'] = true;
                        // $arr[$v[$fieldPri]]['ico'] = false;
                        // $arr[$v[$fieldPri]]['checked'] = false;
                    }
                }
                return $arr;
            case 2:
                $arr = array();
                $id = 0;
                foreach ($data as $v) {
                    if ($v[$fieldPid] == $pid) {
                        $arr[$id] = $v;
                        $arr[$id]['level'] = $level;
                        $arr[$id]['html'] = str_repeat($html, $level - 1);
                        $sArr = self::channel($data, $fieldPri, $fieldPid, $v[$fieldPri], $sid, $type, $html, $level + 1);
                        $arr = array_merge($arr, $sArr);
                        $id = count($arr);
                    }
                }
                return $arr;
            case 3:
                static $arr = array();
                foreach ($data as $v) {
                    if ($v[$fieldPri] == $sid) {
                        $arr[] = $v;
                        $sArr = self::channel($data, $fieldPri, $fieldPid, $pid, $v[$fieldPid], $type, $html, $level + 1);
                        $arr = array_merge($arr, $sArr);
                    }
                }
                return $arr;
        }
    }

    // 分组查询
   $view_data =Db::name('novel_view')->where('status', 0)->field('novel_id,count(*) as novel_total,user_id')->group('novel_id,user_id')->select();

  /**
* 二维数组查询指定元素
* @param $array 需要匹配的数组
* @param $index 匹配的数组下标
* @param $value 被匹配值
* @return array 返回匹配到的数组/匹配不到则返回空数组
*/
function new_filter_by_value ($array, $index, $value) 
{ 
    $new_array = [];
    if(is_array($array) && count($array)>0)  
    { 
        foreach(array_keys($array) as $key){ 
            $temp[$key] = $array[$key][$index]; 
            if ($temp[$key] == $value){ 
                $newarray = $array[$key]; 
                $newarray['key'] = $key;
            } 
        } 
    } 
    if(empty($newarray)){
      return $new_array;
    }else{
      return $newarray; 
    }
}


/**
    * 改二维数组查询指定元素
    * @param $array 需要匹配的数组
    * @param $index 匹配的数组下标
    * @param $value 被匹配值
    * @return array 返回匹配到的数组/匹配不到则返回空数组
    */
    function filter_by_value ($array, $data) 
    { 
        $new_array = [];
        if(is_array($array) && count($array)>0)  
        { 

            foreach(array_keys($array) as $key){ 
                $result = true; 
                foreach ($data as $k => $v) {
                    if ($array[$key][$k] != $data[$k]) {
                        $result = false;
                    }
                }

                if ($result){ 
                    $newarray = $array[$key]; 
                    $newarray['key'] = $key;
                } 
            } 
        } 
        if(empty($newarray)){
          return $new_array;
        }else{
          return $newarray; 
        }
    }