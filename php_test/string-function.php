<?php
$str = "Hello I am saber azizi.I love java developer";
var_dump($str);
var_dump("stripos Saber ==> ".stripos($str,"Saber"));
var_dump("strpos Saber ==> ".strpos($str,"Saber"));
$password = "AdminSaber1366";
var_dump("md5 password ===> ".md5($password));
$str2 = "<body><p>hello world</p></body>";
$str3 = "<script>alert('hello World');</script>";
var_dump("htmlentities ==> ".htmlentities($str2));
var_dump("htmlentities ==> ".htmlentities($str3));
var_dump("htmlspecialchars ==> ".htmlspecialchars($str3));
var_dump("htmlspecialchars_decode ==> ".htmlspecialchars_decode($str3));
var_dump("strip_tags ==> ".strip_tags($str3));
echo htmlentities($str3);
echo "<br/>";
echo strip_tags($str3);