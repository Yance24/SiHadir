<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;

class TimeControl extends Controller
{
    public static function getTime($time = null){
        return ($time == null) ? date('H:i:s',time()):$time;
    }

    public static function getDate($date = null){
        return ($date == null) ? date('Y-m-d',time()):$date;
    }

    public static function getDays($days = null){
        if($days != null) return $days;
        $dayNumber = Carbon::now()->dayOfWeek;
        switch ($dayNumber) {
            case 0: return 'Minggu';
            case 1: return 'Senin';
            case 2: return 'Selasa';
            case 3: return 'Rabu';
            case 4: return 'Kamis';
            case 5: return 'Jumat';
            case 6: return 'Sabtu';
        }
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
