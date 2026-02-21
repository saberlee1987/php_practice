<?php
global $pdo;
require_once 'connectToDataBase.php';
require_once 'jdf.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update php</title>
</head>
<body>
    <h4>update person data</h4>
    <a href="./showPersons.php">Back to person list</a> <br><br>

    <?php
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === "GET") {
        if (empty($_GET["id"])) {
            header("Location: showPersons.php");
            exit(0);
        } else {
            $id = $_GET["id"];
            $person = getPersonById($id);
            if (!$person) {
                header("Location: showPersons.php");
                exit(0);
            } ?>
            <form action="" method="post" novalidate>
                <input type="hidden" name="id" value="<?= $id ?>"/>
                <label for="firstName">firstName</label>
                <input type="text" name="firstName" id="firstName" placeholder="firstName"
                       value="<?= $person["firstName"] ?>"><br>
                <label for="lastName">lastName</label>
                <input type="text" name="lastName" id="lastName" placeholder="lastName"
                       value="<?= $person["lastName"] ?>"><br>
                <label for="mobile">mobile</label>
                <input type="text" name="mobile" id="mobile" placeholder="mobile" value="<?= $person["mobile"] ?>"><br>
                <label for="nationalCode">nationalCode</label>
                <input type="text" name="nationalCode" id="nationalCode" readonly disabled value="<?= $person["nationalCode"] ?>"><br>
                <label for="email">email</label>
                <input type="email" name="email" id="email" placeholder="email" value="<?= $person["email"] ?>"><br>
                <label for="age">age</label>
                <input type="number" name="age" id="age" placeholder="age" value="<?= $person["age"] ?>"><br>
                <label for="createdAt">createdAt</label>
                <input type="text" name="createdAt" id="createdAt" readonly disabled value="<?= jdate("Y/n/j", strtotime($person["createdAt"])) ?>"
                       size="30"><br>
                <label for="updatedAt">updatedAt</label>
                <input type="text" name="updatedAt" id="updatedAt" readonly disabled size="30"
                       value="<?=jdate("Y/n/j", strtotime($person["updatedAt"]))?>"><br>
                <input type="submit" value="update">
            </form>
        <?php }
    } else if ($method === "POST") {
        extract($_POST);
        updatePerson();
        header("Location: showPersons.php");
    }
    ?>


</body>
</html>
<?php

function updatePerson(): void
{
    global $pdo, $age, $email, $firstName, $lastName, $mobile, $id;
    $sql = "update persons set firstName=:firstName , lastName=:lastName , age=:age 
               , email=:email , mobile=:mobile , updatedAt=:updatedAt   where id=:id";
    $PDOStatement = $pdo->prepare($sql);
    $PDOStatement->execute([
            ":firstName" => $firstName,
            ":lastName" => $lastName,
            ":age" => $age,
            ":email" => $email,
            ":mobile" => $mobile,
            ":updatedAt" => date('Y-m-d H:i:s'),
            ":id" => $id

    ]);
}

?>