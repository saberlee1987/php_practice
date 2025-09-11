<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
</head>
<body>
<?php
if (isset($_GET["attempt"])) {
    echo "<h3 style='color: red'>Invalid username or password</h3>";
}
?>
<form action="./secret.php" method="post" novalidate>
    <input type="text" name="username" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="submit" value="login">
</form>
</body>
</html>