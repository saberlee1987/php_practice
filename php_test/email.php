<?php

var_dump("send email");
$email = "saberazizi66@yahoo.com";
$subject = "test email in php";
$message = "Hello I am saber azizi";
mail($email,$subject,$message,"From: saberlee66@gmail.com");
var_dump("email send successfully");