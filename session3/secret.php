<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == "saber66" && $password == "AdminSaber66") {
        $_SESSION["isLogin"] = true;
        echo "<p>Welcome to my site</p>";
    } else {
        header("Location: login.php?attempt");
    }
} else {
    if (isset($_SESSION["isLogin"])) {
        echo "<p>Welcome to my site</p>";
    } else {
        header("Location: login.php");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>secret page</title>
</head>
<body>
<h4>secret page</h4>
<a href="./logout.php">logout</a>
</body>
</html>
