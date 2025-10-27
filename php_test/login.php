<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Style the form container */
        form {
            border: 3px solid #f1f1f1;
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        /* Full-width input fields */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Buttons styling */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Cancel button styling */
        .cancelbtn {
            background-color: #f44336;
        }

        /* Center avatar image */
        .imgcontainer {
            text-align: center;
            margin-bottom: 20px;
        }

        .imgcontainer img {
            width: 50%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* Forgot password link */
        .psw {
            float: right;
            padding-top: 10px;
        }

        @media screen and (max-width: 300px) {
            .psw {
                display: block;
                float: none;
                text-align: center;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<?php
if (isset($_GET["attempt"])) {
    echo "<h3 style='color: #f44336'>login failed</h3>";
}
?>

<form action="secret.php" method="post">
    <div class="imgcontainer">
        <img src="avatar.jpeg" alt="Avatar" class="avatar">
    </div>
    <div class="container">
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        <button type="submit">Login</button>
    </div>
</form>
</body>
</html>
