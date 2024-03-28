<?php 

class Verification {
    public static function isbn($value)
    {
        $value = trim($value);
        return strlen($value) == 13 && is_numeric($value);
    }
    public static function titre($value)
    {
        $value = trim($value);
        return strlen($value) >= 1 && strlen($value) <= 50 && preg_match("/[A-Z]/",$value);
    }
    public static function string($value)
    {
        $value = trim($value);
        return strlen($value) >= 1 && strlen($value) <= 50 && !preg_match("/[1-9]/",$value);
    }
    public static function date($value)
    { 
        if(!empty($value)){
            $value = trim($value);
        list($y, $m, $d) = explode('-', $value);
        if(checkdate($m, $d, $y)){
            return true;
            }
        }
        return false;
    }
    public static function img($name,$error)
    {
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        $extensions = [ 'png',];
        return in_array($extension, $extensions) && $error == 0;
    }
    public static function prix($value)
    {
        return $value >= 0.01  && $value <= 100 && is_numeric($value);
    }
    public static function page($value)
    {
        $value = trim($value);
        $value = intval($value);
        return $value >= 1  && $value <= 20000 && is_numeric($value) && is_int($value);
    }
    public static function note($value)
    {
        $value = trim($value);
        $value = intval($value);
        return $value >= 1  && $value <= 5 && is_numeric($value) && is_int($value);
    }
    public static function description($value)
    {
        $value = trim($value);
        return strlen($value) >= 1  && strlen($value) <= 1000 ;
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
$verif = new Verification();