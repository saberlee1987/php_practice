<?php
require 'StudentRepository.php';
require 'Student.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register student</title>
</head>
<body>
<a href="./001.php">student list</a>
<h3>register new student</h3>
<form action="register.php" method="post" novalidate>
    <input type="text" name="name" placeholder="name"><br>
    <input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="number" name="age" placeholder="age"><br>
    <textarea name="address" rows="6" cols="35" placeholder="address"></textarea><br>
    <input type="submit" value="register">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    var_dump($_POST);
    //extract($_POST);
    $student = new Student();
    $student->setName($_POST["name"]);
    $student->setEmail($_POST["email"]);
    $student->setPassword($_POST["password"]);
    $student->setAge($_POST["age"]);
    $student->setAddress($_POST["address"]);
//    var_dump($student);
    $studentRepository = new StudentRepository();

    $result =$studentRepository->saveStudent($student);
//    var_dump($result);
    if ($result) {
        header("Location: 001.php?added=ok");
    } else {
        var_dump("error ===> ", $result);
    }

}
?>
</body>
</html>
