<?php
require "jdf.php";
date_default_timezone_set("Asia/Tehran");
$date1 = date("Y/m/d H:i:s");
$date2 = date("y/m/d D/M l H");
var_dump($date1);
var_dump($date2);
var_dump(time());
var_dump(date("Y/m/d H:i:s",time()));
$mktime = mktime(4, 25, 30, 12, 7, 1987);
var_dump($mktime);
var_dump(date("Y/m/d H:i:s",$mktime));
var_dump(strtotime("4:35am dec 07 1987"));
var_dump(date("Y/m/d H:i:s",strtotime("4:35pm dec 07 1987")));

var_dump(strtotime("tomorrow"));
var_dump(date("Y/m/d H:i:s",strtotime("tomorrow")));
var_dump(gregorian_to_jalali(1987,12,7,"/"));
var_dump(jdate("Y/m/j",$mktime,"","Asia/Tehran","en"));
var_dump(jdate("Y/n/j",$mktime,"","Asia/Tehran","fa"));
var_dump(dateToJalali("1987-12-07",'-'));


function dateToJalali(string $date,string $delimiter): array|string
{
    list($year,$month,$day) = explode($delimiter,$date);
    $hour = 0;
    $minute=0;
    $second=0;
    var_dump($year,$month,$day);
    $time = mktime($hour,$minute,$second,$month,$day,$year);
//    $time = mktime($month,$day,$year);
    var_dump($time);
    return jdate("Y/n/j",$time,'',"Asia/Tehran","en");
}