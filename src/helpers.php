<?php
if (! function_exists('getArrAllSubset')) {

    function getArrAllSubset($arr){
        $arr = array_unique($arr);
        $res = [[]];
        foreach ($arr as $v){
            //遍历过的元素 组成的子集 和当前元素组合 
            $tmpRes =  array_map(function ($subset) use ($v){
                return array_merge($subset,[$v]) ;
            },$res);
            $res = array_merge($res,$tmpRes);//已经遍历完的元素的所有子集
        }
        //[a,b,c]的子集 == [a,b]的子集 + [a,b]子集全部加上一個 c
        // [a]的子集 = [] 的子集 + []子集全部加上一個a
        // 数学归纳法 可以证明上面公式
        return $res;
    }
}