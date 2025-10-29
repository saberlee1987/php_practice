<?php
//var_dump($_SERVER);
//var_dump($_GET);
session_start([
    "name"=> "saber_sessionId"
]);
$_SESSION["token"] = "wesdflgsdfse";
$_SESSION["auth"] = true;
$_SESSION["name"] = "saber";
 //setcookie("theme","light",time() + 6000 , "/","localhost",false,true);
var_dump($_SESSION);
//var_dump($_COOKIE);