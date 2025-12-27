<?php
var_dump("file 1");
var_dump("file_exists(\"files/test1.txt\") ==> ".file_exists("files/test1.txt"));
var_dump("file_exists(\"files/test2.txt\") ==> ".file_exists("files/test2.txt"));
var_dump("is_file(\"files/test1.txt\")==> ".is_file("files/test1.txt"));
var_dump("is_dir(\"files\") ==> ".is_dir("files"));
//unlink("files/test2.txt"); remove file
//$lines="";
//$file = fopen("files/test1.txt", "a+");
//for ($i = 0; $i <10 ; $i++) {
//    var_dump($i);
////    var_dump($i." ==> ".fgetc($file));
//    $lines.=fgets($file)."\n";
//}
//fwrite($file,"\nhello saber azizi");
//$lines = file_get_contents($file);
//var_dump($lines);
//
$path = "files/test1.txt";
$str = "This is new text".PHP_EOL;
//file_put_contents($path,$str,FILE_APPEND);
$lines = file_get_contents($path);
echo ($lines);
echo nl2br($lines);
var_dump(filesize($path));
var_dump(filetype($path));
//chown($path,"saber66");
//chgrp($path,"saber");
//chmod($path,0777);
//var_dump($lines);
//fclose($file);
$list = glob("*.php");
var_dump($list);



