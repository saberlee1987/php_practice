<?php
var_dump(rand(1,100));
var_dump(mt_rand(10,1000));
try {
    var_dump(random_int(50, 5000));
    var_dump(random_bytes(15));
    var_dump(bin2hex(random_bytes(15)));
    var_dump(openssl_random_pseudo_bytes(14));
    var_dump(bin2hex(openssl_random_pseudo_bytes(14)));
} catch (Exception $e) {
    var_dump($e->getMessage());
}
var_dump(implode(range('a','z')));
var_dump(implode(range('0','9')));
var_dump(implode(range('A','Z')));

function generateRandomString(int $length=8) :string
{
    $chars = implode(range('a', 'z')) . implode(range('0', '9'))
        . implode(range('A', 'Z'));
    $charsLength = strlen($chars);
    $result = "";

    for ($i = 0; $i < $length; $i++) {
        $result .= $chars[rand(0, $charsLength-1)];
    }
    return $result;
}

var_dump(generateRandomString());
var_dump(generateRandomString(12));
var_dump(generateRandomString(25));