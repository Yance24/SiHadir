<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class TimeControl extends Controller
{
    public static function getTime(){
        return '07:00:00';
        // return date('H:i:s',time());
    }

    public static function getDate(){
        return '2023-11-1';
        // return date('Y-m-d',time());
    }

    public static function getDays(){
        return 'Senin';
        // $dayNumber = Carbon::now()->dayOfWeek;
        // switch ($dayNumber) {
        //     case 0: return 'Minggu';
        //     case 1: return 'Senin';
        //     case 2: return 'Selasa';
        //     case 3: return 'Rabu';
        //     case 4: return 'Kamis';
        //     case 5: return 'Jumat';
        //     case 6: return 'Sabtu';
        // }
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
