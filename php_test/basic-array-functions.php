<?php
$array = ["ali", "erfan", "saber", "bruce", "jet","ali","saber"];
$array2 = ["name" => "saber", "family" => "azizi", "age" => 38];
$array3 = ["a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow"];
$array4 = ["e"=>"red","f"=>"green","g"=>"black","h"=>"brown"];
var_dump($array);
var_dump("count(array) ==> " . count($array));
var_dump("sizeof(array) ==> " . sizeof($array));
var_dump(array_keys($array));
var_dump(array_values($array));
if (array_key_exists("name",$array)) {
    var_dump("name exist in array");
}else{
    var_dump("name does not exist in array");
}
if (in_array("saber",$array2)) {
    var_dump("saber exist in array2");
}else{
    var_dump("saber does not exist in array2");
}
var_dump(array_merge($array,$array2));
var_dump(array_unique($array));
var_dump(array_reverse($array));
var_dump(array_search("bruce",$array));
//var_dump(array_splice($array3,2,1,$array4));
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

function odd(int $value)
{
    return ($value & 1);
}

function even(int $value)
{
    return !($value & 1);
}
var_dump(array_filter($numbers,function ($a){
    return odd($a);
}));

var_dump(array_filter($numbers,"even"));

$name ="saber";
$lastname="azizi";
$gender="male";
$age = 38;
var_dump(compact("name","gender","age","lastname"));
//var_dump(odd(1));
//var_dump(odd(2));
//var_dump(odd(3));
//var_dump(odd(30));
