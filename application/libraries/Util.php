<?php
class Util
{
    public static function printr($string)
    {
        echo "<pre>";
        print_r($string);
        echo "</pre>";
    }

    public static function format_birthday($birthday)
    { 
        $year = substr($birthday, 0, 4);
        $month = substr($birthday, 4, 2);
        $day = substr($birthday, 6, 2);

        return $month."/".$day."/".$year;
    }
}

?>
