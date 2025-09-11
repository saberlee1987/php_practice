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
    <title>session 4 -001</title>
</head>
<body>
<?php
$studentRepository = new StudentRepository();
$students = $studentRepository->findAllStudents();
?>
<h3>student information</h3>
<a href="./register.php"> register new student</a>
<?php
 if (isset($_GET["deleted"]) && $_GET["deleted"] == "ok") {
     echo "<h3 style='color: green'>student deleted successfully</h3>";
 }
if (isset($_GET["added"]) && $_GET["added"] == "ok") {
    echo "<h3 style='color: green'>student added successfully</h3>";
}
if (isset($_GET["updated"]) && $_GET["updated"] == "ok") {
    echo "<h3 style='color: green'>student added successfully</h3>";
}
if (isset($_GET["notExist"]) && $_GET["notExist"] == "ok") {
    echo "<h3 style='color: red'>student does not exist</h3>";
}
?>
<table border="2">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>age</th>
        <th>address</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
    <?php
    foreach ($students as $student) :
        ?>
        <tr>
            <td><?= $student->getName() ?></td>
            <td><?= $student->getEmail() ?></td>
            <td><?= $student->getAge() ?></td>
            <td><?= $student->getAddress() ?></td>
            <td><a href="./edit.php?id=<?=$student->getId()?>">EDIT</a></td>
            <td><a href="./delete.php?id=<?=$student->getId()?>">Delete</a></td>
         </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
