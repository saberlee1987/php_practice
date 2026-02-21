<?php
require_once 'jdf.php';
$username = "saber66";
$password = "AdminSaber66";
$dns = "mysql:host=localhost:3306;dbname=test2";
$pdo = new PDO($dns,$username,$password);


function getPersonById($id)
{
    global $pdo;
    $statement = $pdo->prepare("select * from persons where id=:id");
    $statement->execute([
        ":id"=>$id
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getPersonByNationalCode($nationalCode)
{
    global $pdo;
    $statement = $pdo->prepare("select * from persons where nationalCode=:nationalCode");
    $statement->execute([
        ":nationalCode"=>$nationalCode
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

