<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register page</title>
</head>
<body>
    <h3>Register page</h3>
<?php
$firstname = "";
$lastname = "";
$age = 0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (isset($_POST['firstname'])) {
          $firstname = $_POST['firstname'];
      }
      if (isset($_POST['lastname'])) {
          $lastname = $_POST['lastname'];
      }
      if (isset($_POST['age'])) {
          $age = $_POST['age'];
      }
  }

?>
    <h4>FirstName : <?php echo $firstname?></h4>
    <h4>Lastname : <?php echo $lastname?></h4>
    <h4>age : <?php echo $age?></h4>
</body>
</html>
