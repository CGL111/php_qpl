<?php

class Arr
{
    /**
     * 对于内容相同顺序不同的算作相同的数据
     * 支持字符串数据以逗号隔开
     * 例如 '1,2,3'，'2,3,1'
     * @param $list
     * @param string $separator
     */
   public static function getAllComb($list){
        $res = [];
        //初始化位置访问为0
        $mp = [];
        $now =  array();

        foreach ($list as $v){
            $test = explode(',',$v);

            for($i = 0;$i < count($test);++$i){
                $mp[$i] = 0;
            }
            Arr::next_permutation($test,$mp,0,$res,$now);
        }
        return $res;
    }

    /**
     * 递归实现全排列
     * @param $v
     * @param $mp
     * @param $t
     * @param $rt
     * @return mixed
     */
    public static function next_permutation($v,$mp,$t,&$rt,&$now){
        if($t == count($v)){
            array_push($rt,implode(',',$now));
        }
        for ($p = 0; $p < count($v);++$p){
            if($mp[$p] == 0){
                $mp[$p] = 1;
                array_push($now,$v[$p]);
                Arr::next_permutation($v,$mp,$t+1,$rt,$now);
                array_pop($now);
                $mp[$p] = 0;
            }
        }

    }

}