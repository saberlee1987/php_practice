<?php
global $pdo;
require_once 'personDatabase.php';
require_once 'personDatabase.php';
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

