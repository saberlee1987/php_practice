<?php
global $pdo;
require_once 'connectToDataBase.php';

$method = $_SERVER['REQUEST_METHOD'];
$firstName = "";
$lastName = "";
$mobile = "";
$nationalCode = "";
$email = "";
$age = "";
$errorMessage = "";
if ($method === 'POST') {
    extract($_POST);
    //validation
    if (empty($firstName))  $errorMessage.="firstname is required <br/>";
    if (empty($lastName))  $errorMessage.="lastName is required <br/>";
    if (empty($mobile)  )  $errorMessage.="mobile is required <br/>";
    if (!str_starts_with($mobile,"09") || strlen($mobile) !=11)
        $errorMessage.="mobile is invalid <br/>";
    if (empty($nationalCode))  $errorMessage.="nationalCode is required <br/>";
    if (strlen($nationalCode) !=10)  $errorMessage.="nationalCode is invalid <br/>";
    if (empty($email))  $errorMessage.="email is required <br/>";
    if (!filter_var($email,FILTER_VALIDATE_EMAIL))  $errorMessage.="email is invalid <br/>";
    if (empty($age))  $errorMessage.="age is required <br/>";

    if (!$errorMessage) {
        $personByNationalCode = getPersonByNationalCode($nationalCode);
        if ($personByNationalCode) {
            $errorMessage.="person already exist by nationalCode ${nationalCode} <br/>";
        }else{
            savePerson();
            header("Location: showPersons.php");
        }
    }
}


function savePerson(): void
{
    global $pdo, $age, $email, $firstName, $lastName, $mobile, $nationalCode;
    $sql = "insert into persons  (firstName,lastName,age,nationalCode,email,mobile,createdAt,updatedAt)
          values(:firstName,:lastName,:age,:nationalCode,:email,:mobile,:createdAt,:updatedAt) ";
    $PDOStatement = $pdo->prepare($sql);
    $PDOStatement->execute([
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":nationalCode" => $nationalCode,
            ":age" => $age,
            ":email" => $email,
            ":mobile" => $mobile,
            ":createdAt" => date('Y-m-d H:i:s'),
            ":updatedAt" => date('Y-m-d H:i:s')
    ]);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new person</title>
</head>
<body>
    <h4>Add new Person data</h4>
    <?php
    if ($errorMessage) { ?>
        <h4 style="color: red"><?=$errorMessage?></h4>
    <?php }  ?>
    <form action="" method="post" novalidate>
        <label for="firstName">firstName</label>
        <input type="text" name="firstName" id="firstName" placeholder="firstName"
               value="<?= $firstName ?>"><br>
        <label for="lastName">lastName</label>
        <input type="text" name="lastName" id="lastName" placeholder="lastName"
               value="<?= $lastName ?>"><br>
        <label for="mobile">mobile</label>
        <input type="text" name="mobile" id="mobile" placeholder="mobile" value="<?= $mobile ?>"><br>
        <label for="nationalCode">nationalCode</label>
        <input type="text" name="nationalCode" id="nationalCode" value="<?= $nationalCode ?>"><br>
        <label for="email">email</label>
        <input type="email" name="email" id="email" placeholder="email" value="<?= $email ?>"><br>
        <label for="age">age</label>
        <input type="number" name="age" id="age" placeholder="age" value="<?= $age ?>"><br>
        <input type="submit" value="Add new person">
    </form>
</body>
</html>
