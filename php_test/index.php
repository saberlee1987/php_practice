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

//var_dump($users[2]["parents"]["mom"]);
//var_dump($users[2]["parents"]["dad"]);
//$age = 10;
//$a = "10";
//$b = 10;
//var_dump($a == $age);
//var_dump($a === $age);
//var_dump($age === $b);


function printArray($array): void
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            printArray($value);
            var_dump("==================================================================");
        } else {
            var_dump("$key : $value");
        }
    }
}


//printArray($users);

function sumToNumbers(int|float $n1, int|float $n2): int|float
{
    return $n1 + $n2;
}

function prettyEcho(string $text, int $fontSize, string $color = "green"): void
{
    echo "<span style='color: $color;font-size: {$fontSize}px'>$text</span><br/>";
}

function sumNumbers(...$numbers): int
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

$sayHello = function (string $firstname, string $lastname): string {
    return "Hello $firstname $lastname";
};

// closure
$name = "saber";

$greeting = function () use ($name) {
    $name = "bruce";
    return "Hello $name from global scope";
};
// by reference
$greeting2 = function () use (&$name) {
    $name = "bruce";
    return "Hello $name from global scope";
};
//array filter
$numbers = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];

$newNumbers = array_filter($numbers, function ($number) {
    return $number % 3 == 0;
});


function array_filter2(array $numbers, ?callable $callback): array
{
    $newNumbers = [];
    foreach ($numbers as $number) {
        $newNumbers[] = $callback($number);
    }
    return $newNumbers;
}

$newNumbers2 = array_filter2($numbers, function ($number) {
    return $number + 10;
});

$text = "hello I am saber azizi.I love programming";
$text2 = "1,2,3,4,5,6,7,8,9,10";


var_dump(sumToNumbers(12, 17));
var_dump(sumToNumbers(2.6, 4.8));
prettyEcho("Hello World", 8, "blue");
prettyEcho("Hello World", 10, "red");
prettyEcho("Hello World", 12, "gold");
prettyEcho("Hello World", 14);
prettyEcho("Hello World", 16, "black");
var_dump(sumNumbers(1, 2, 3, 4, 5, 6, 7, 8, 9, 10));
var_dump($sayHello("saber", "azizi"));
var_dump($greeting());
var_dump("name is $name");
var_dump($greeting2());
var_dump("name is $name");
//var_dump($numbers);
//var_dump($newNumbers);
//var_dump($newNumbers2);
echo "<hr/>";
var_dump($text);
var_dump(str_contains($text, "saber"));
var_dump(str_ireplace(["saber", "azizi", "programming"], ["bruce", "lee", "jeetkondu"], $text));
var_dump(mb_strlen($text));
var_dump(strtoupper($text));
var_dump(strtolower($text));
var_dump(explode(",", $text2));
var_dump(implode(",",$numbers));
var_dump(range("0","10"));
var_dump(range("a","z"));
var_dump(range("A","Z"));
var_dump(range(chr(97),chr(122)));
//var_dump(sumToNumbers(12,"hello"));
?>