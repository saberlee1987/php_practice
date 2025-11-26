<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>upload file</title>
</head>
<body>
<h4>upload file in php</h4>
<?php
 if (isset($_GET["error"])) {
    echo "<h4 style='color: #f44336'>error when upload file . please try again</h4>";
 }
if (isset($_GET["success"])) {
    echo "<h4 style='color: #04AA6D'>success upload file</h4>";
}
#this is comment
// this is comment
?>
<form action="processUploadFile.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" >
    <input type="submit" value="upload">
</form>
</body>
</html>
