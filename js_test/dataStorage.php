<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>save data storage</title>
</head>
<body>
    <h4>save data storage</h4>
    <form action="" method="post" novalidate>
        <label for="username">username</label>
        <input type="text" id="username" name="username" placeholder="username"><br/><br/>
        <label for="password">password</label>
        <input type="password" id="password" name="password" placeholder="password"><br/><br/>
        <input type="submit" value="login">
    </form>

    <?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if ($requestMethod === 'POST' && isset($_POST["username"]) && isset($_POST["password"]) ) {
        $username =  $_POST["username"];
        $password =  $_POST["password"];
//        var_dump($username,$password);
        $data = ["username" => $username,"password" => $password];
        $value = "username${username},password${password}";
        setcookie("data",$value,time() + (7 * 24 * 60 * 60) , path: "/",httponly: false);
    }
    ?>
    <script>
        //document.cookie ="user=saber66;path=/;secure;httpOnly";
        localStorage.setItem("test","saber1366");
        console.log(document.cookie);
        console.log(localStorage.getItem("test"))
    </script>
</body>
</html>