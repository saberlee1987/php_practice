<?php
var_dump("data type comparison");
$name = "saber";
var_dump(gettype($name));
$age = 38;
var_dump(gettype($age));
$average = 19.38;
var_dump(gettype($average));
$data = [];
var_dump(gettype($data));
$flag = rand(0,1) > 0;
var_dump(gettype($flag));
$char = 'a';
var_dump(gettype($char));
$std = new stdClass();
var_dump(gettype($std));
var_dump(gettype(null));
var_dump(tmpfile());
$h='';
$h='0';

if (empty($h)) {
    var_dump("true");
} else {
    var_dump("false");
}

