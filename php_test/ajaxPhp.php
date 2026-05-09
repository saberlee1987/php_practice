<?php
$username = "saber66";
$password = "AdminSaber66";
$dns = "mysql:host=localhost:3306;dbname=test3";
$pdo = new PDO($dns,$username,$password);
function addStudent(mixed $name, mixed $age) : bool
{
//    global $pdo;
//    $statement = $pdo->prepare("insert into students (name,age) values (:name,:age)");
//    $statement->execute([
//       "name" => $name
//       ,"age" => $age
//    ]);
//    $statement->closeCursor();
    return true;
}

function getAllStudents() : array
{
    global $pdo;
    return $pdo->query("select * from students")->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($_POST["name"]) && !empty($_POST["age"])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $result = addStudent($name, $age);
    if ($result) {
//        echo "<pre>";
//        echo "your student save to database <br/><br/>";
        echo json_encode(getAllStudents());
//        echo "</pre>";
    }else {
        echo "sorry dont save your students to database";
    }
} else {
    echo "name or age is required";
}