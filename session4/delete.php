<?php
require 'StudentRepository.php';
require 'Student.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $studentRepository = new StudentRepository();
    if ($studentRepository->existById($id)) {
        $studentRepository->deleteById($id);
        header("Location: 001.php?deleted=ok");
    } else {
        header("Location: 001.php?notExist=ok");
    }
}
