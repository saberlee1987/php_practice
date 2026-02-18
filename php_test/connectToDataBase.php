<?php
require_once 'jdf.php';
$username = "saber66";
$password = "AdminSaber66";
$dns = "mysql:host=localhost:3306;dbname=test2";
$pdo = new PDO($dns,$username,$password);
//var_dump("connected ....");
$prepareStatement = $pdo->prepare("select * from persons");
$prepareStatement->execute();
$persons = $prepareStatement->fetchAll(PDO::FETCH_CLASS);

foreach ($persons as $person) {
    foreach ($person as $property => $value) {
        if ($property === "createdAt" || $property === "updatedAt") {
            var_dump($property . " ==> " . jdate("Y/n/j", strtotime($value)));
        } else {
            var_dump($property . " ==> " . $value);
        }
    }
 var_dump("===============================================================================================");
}
