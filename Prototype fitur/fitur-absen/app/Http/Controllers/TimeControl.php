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

    public static function operateTime($timeA, $timeB, string $operator, $format = true){        
        $result = 0;

        $timeA = strtotime($timeA);
        $timeB = strtotime($timeB);
        $time0 = strtotime('00:00:00');

        if($operator == "+")
            $result = $timeA + ($timeB - $time0);
        else if($operator == "-")
            $result =  $timeA - ($timeB - $time0);

        $result -= $time0;

        echo $timeA.'<br>';
        echo $timeB.'<br>';
        echo $operator.'<br>';
        echo $result.'<br><br>';
        return ($format)?date('H:i:s',$result):$result;
    }
}
