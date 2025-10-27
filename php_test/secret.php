<?php
//var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])
        && !empty($_POST["password"])) {
        var_dump($_POST);
        echo "<h3 style='color: #04AA6D'>Welcome to my page</h3>";
    } else {
        header("Location: login.php?attempt");
    }
}else {
        header("Location: login.php");
}
