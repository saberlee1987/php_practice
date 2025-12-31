<?php
var_dump("test1 php");
$text = "  Hello World  ";
var_dump($text, trim($text));

function cube(int $n): int
{
    return ($n * $n * $n);
}

function average(array $numbers): float|int|null
{
    $sum = 0;
    $result = null;
    if (!empty($numbers)) {
        foreach ($numbers as $number) {
            $sum += $number;
        }
        $result = $sum / count($numbers);
    }
    return $result;
}

$map = array_map('cube', [1, 2, 3, 4, 5, 6]);
var_dump($map);
var_dump(is_array($map));
$dateInterval = date_diff(date_create("2012-03-15"), date_create("2018-09-12"));
var_dump($dateInterval->format("%Y years %m month %d days"));

$person = [
    "id" => 12
    , "firstname" => "saber"
    , "lastname" => "azizi"
    , "age" => 38
    , "email" => "saberazizi66@yahoo.com"
    , "mobile" => "09365627895"
];

$personJson = json_encode($person, JSON_PRETTY_PRINT);
var_dump($personJson);

$a = "10";
$b = 10;
var_dump($a == $b); // true
var_dump($a === $b); // false

var_dump(mt_rand(10, 100));


var_dump(average([1,2,3,4,5,6,7,8,9,10]));