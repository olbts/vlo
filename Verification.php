<?php 

class Verification {
    
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
    public static function password($value)
    {   
        $value = trim($value);
        return strlen($value) >= 8 ;
    }
    public static function equalPassword($value1,$value2)
    {
        $value1 = trim($value1);
        $value2 = trim($value2);
        return $value1 == $value2;
    }
}



