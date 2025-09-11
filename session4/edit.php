<?php
require 'StudentRepository.php';
require 'Student.php';
$id = 0;
$student = null;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $studentRepository = new StudentRepository();
        if ($studentRepository->existById($id)) {
            $student = $studentRepository->findById($id);
        } else {
            header("Location: 001.php?notExist=ok");
        }
    }
}else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);
    $student = new Student();
    $student->setName($name);
    $student->setEmail($email);
    $student->setPassword($password);
    $student->setAge($age);
    $student->setAddress($address);
    $student->setId($id);
//    var_dump($student);
    $studentRepository = new StudentRepository();
        $result = $studentRepository->updateStudent($student);
    if ($result) {
        header("Location: 001.php?updated=ok");
    } else {
        var_dump("error ===> ", $result);
    }
}



//var_dump($id);
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Edit student</title>
    </head>
    <body>
    <h3>student edit page</h3>

    <form action="edit.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?= $id ?>"/>
        <input type="text" name="name" placeholder="name" value="<?= $student->getName() ?>"><br>
        <input type="email" name="email" placeholder="email" value="<?= $student->getEmail() ?>"><br>
        <input type="password" name="password" placeholder="password" value="<?= $student->getPassword() ?>"><br>
        <input type="number" name="age" placeholder="age" value="<?= $student->getAge() ?>"><br>
        <textarea name="address" rows="6" cols="35" placeholder="address">
        <?= $student->getAddress() ?>
    </textarea><br>
        <input type="submit" value="update">
    </form>
    </body>
    </html>
