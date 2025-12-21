<?php
$data = ['java','saber@1987','255ff'];
foreach ($data as $d) {
    if (ctype_alnum($d)) {
        var_dump("$d is alpha numeric");
    }else {
        var_dump("$d isn't alpha numeric");
    }
}
#######################################################################################
echo "<hr/>";
foreach ($data as $d) {
    if (ctype_alpha($d)) {
        var_dump("$d is alpha ");
    }else {
        var_dump("$d isn't alpha ");
    }
}
#######################################################################################
echo "<hr/>";
$data = ["\t\n\r","saber@1987","saber66"];
foreach ($data as $d) {
    if (ctype_cntrl($d)) {
        var_dump("$d is cntrl");
    }else {
        var_dump("$d isn't cntrl");
    }
}
#######################################################################################
echo "<hr/>";
$data = ["1865","1987.65","saber66"];
foreach ($data as $d) {
    if (ctype_digit($d)) {
        var_dump("$d is digit");
    }else {
        var_dump("$d isn't digit");
    }
}
#######################################################################################
echo "<hr/>";
$data = ["1865","1987.65","saber66"];
foreach ($data as $d) {
    if (ctype_digit($d)) {
        var_dump("$d is digit");
    }else {
        var_dump("$d isn't digit");
    }
}
################################################################################
echo "<hr/>";
$data = ["1865","\r\t\n","ali 34","1987.65","saber66"];
foreach ($data as $d) {
    if (ctype_graph($d)) {
        var_dump("$d is graph");
    }else {
        var_dump("$d isn't graph");
    }
}

####################################################################################
echo "<hr/>";
$data = ["1865","\r\t\n","ali 34","1987.65","saber66"];
foreach ($data as $d) {
    if (ctype_print($d)) {
        var_dump("$d is print");
    }else {
        var_dump("$d isn't print");
    }
}
#########################################################################################
echo "<hr/>";
$data = ["1865ASS","all","Ali","a1987.65","saber"];
foreach ($data as $d) {
    if (ctype_lower($d)) {
        var_dump("$d is lower");
    }else {
        var_dump("$d isn't lower");
    }
}
#########################################################################################
echo "<hr/>";
$data = ["1865ASS","all","Ali","!@$%^","!@# $%$#"];
foreach ($data as $d) {
    if (ctype_punct($d)) {
        var_dump("$d is punct");
    }else {
        var_dump("$d isn't punct");
    }
}
#########################################################################################
echo "<hr/>";
$data = ["1865ASS","all","ALI","a1987.65","Saber"];
foreach ($data as $d) {
    if (ctype_upper($d)) {
        var_dump("$d is upper");
    }else {
        var_dump("$d isn't upper");
    }
}