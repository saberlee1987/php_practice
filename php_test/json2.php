<?php
$users = [
    ["name" => "John", "age" => 30],
    ["name" => "Jane", "age" => 25],
    ["name" => "Doe", "age" => 35]
];
$json = json_encode($users);
var_dump($json);
$filename = "users_json.json";
file_put_contents("users_json.json",$json);

$file_get_contents = file_get_contents($filename);
var_dump($file_get_contents);