<?php

namespace App\Http\Controllers;

class TimeControl extends Controller
{
    public static function getTime(){
        return session()->get('waktu');
        //     return date('H:i:s',time());
    }

    public static function getDate(){
            return date('Y-m-d',time());
    }

    public static function compareTime(string $time1, string $time2, string $operator){
        $time1 = strtotime($time1);
        $time2 = strtotime($time2);
        if(
                ($time1 < $time2 && $operator == '<') ||
                ($time1 > $time2 && $operator == '>') ||
                ($time1 == $time2 && $operator == '=') ||
                ($time1 >= $time2 && $operator == '>=') ||
                ($time1 <= $time2 && $operator == '<=')
        )
        return true;
        else return false;
        
    }

    public static function operateTime(string $time1, $time2, string $operator){
        
        $time1 = strtotime($time1);
        if($operator == '+') $result = $time1 + $time2;
        else if($operator == '-') $result =  $time1 - $time2;
        return date('H:i:s',$result);
    }
}
