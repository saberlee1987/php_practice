<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!file_exists($_FILES["file"]["tmp_name"])) {
        header("Location: upload.php?error");
    } else {
        $path = "files/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $path);
        header("Location: upload.php?success");
    }
} else {
    header("Location: upload.php");
}
