<?php
global $pdo;
require_once 'connectToDataBase.php';
require_once 'jdf.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== "GET" || empty($_GET["id"]))  {
    header("Location: showPersons.php");
    exit(0);
}
$id = $_GET["id"];
if (!getPersonById($id)) {
    header("Location: showPersons.php");
    exit(0);
}
deletePersonById($id);
header("Location: showPersons.php");

function deletePersonById($id) :void
{
    global $pdo;
    $statement = $pdo->prepare("delete from persons where id=:id");
    $statement->execute([
        ":id" =>$id
    ]);
}