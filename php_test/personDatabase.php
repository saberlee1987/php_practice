<?php
require_once 'jdf.php';
$username = "saber66";
$password = "AdminSaber66";
$dns = "mysql:host=localhost:3306;dbname=test2";
$pdo = new PDO($dns,$username,$password);


function getPersonById($id)
{
    global $pdo;
    $statement = $pdo->prepare("select * from persons where id=:id");
    $statement->execute([
        ":id"=>$id
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getPersonByNationalCode($nationalCode)
{
    global $pdo;
    $statement = $pdo->prepare("select * from persons where nationalCode=:nationalCode");
    $statement->execute([
        ":nationalCode"=>$nationalCode
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function getPersons(): array
{
    global $pdo;
    $prepareStatement = $pdo->prepare("select id,firstName,lastName,nationalCode,age,mobile,email,createdAt,updatedAt from persons order by id desc");
    $prepareStatement->execute();
    return $prepareStatement->fetchAll(PDO::FETCH_ASSOC);
}
function deletePersonById($id) :void
{
    global $pdo;
    $statement = $pdo->prepare("delete from persons where id=:id");
    $statement->execute([
        ":id" =>$id
    ]);
}

function savePerson(): void
{
    global $pdo, $age, $email, $firstName, $lastName, $mobile, $nationalCode;
    $sql = "insert into persons  (firstName,lastName,age,nationalCode,email,mobile,createdAt,updatedAt)
          values(:firstName,:lastName,:age,:nationalCode,:email,:mobile,:createdAt,:updatedAt) ";
    $PDOStatement = $pdo->prepare($sql);
    $PDOStatement->execute([
        ":firstName" => htmlspecialchars($firstName),
        ":lastName" => htmlspecialchars($lastName),
        ":nationalCode" => htmlspecialchars($nationalCode),
        ":age" => htmlspecialchars($age),
        ":email" => htmlspecialchars($email),
        ":mobile" => htmlspecialchars($mobile),
        ":createdAt" => date('Y-m-d H:i:s'),
        ":updatedAt" => date('Y-m-d H:i:s')
    ]);
}


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