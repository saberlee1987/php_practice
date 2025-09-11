<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>session 2</title>
</head>
<body>
<?php
    $color="#";
    $colors=str_split("abcdef1234567890");
for ($i = 0; $i < 6; $i++) {
    $color.=$colors[rand(0,count($colors) - 1)];
}
?>
<p style="color: <?=$color?>">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aspernatur assumenda blanditiis delectus ducimus
    eligendi error impedit minima nemo perspiciatis, quam, quibusdam saepe sint sit sunt ullam, ut vero voluptates!</p>
</body>
</html>