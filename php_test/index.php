<?php
$users = [
    [
        "firstName" => "Saber",
        "lastName" => "Azizi",
        "age" => 38,
        "favoriteColor" => "black"
    ],
    [
        "firstName" => "Bruce",
        "lastName" => "Lee",
        "age" => 33,
        "favoriteColor" => "white"
    ],
    [
        "firstName" => "Jackie",
        "lastName" => "Chan",
        "age" => 70,
        "favoriteColor" => "yellow",
        "parents" => [
            "mom" => "zahra",
            "dad" => "ali"
        ]
    ]
];

var_dump($users[2]["parents"]["mom"]);
var_dump($users[2]["parents"]["dad"]);
$age = 10;
$a = "10";
$b = 10;
var_dump($a == $age);
var_dump($a === $age);
var_dump($age === $b);

?>