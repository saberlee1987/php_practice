<?php
global $pdo;
require_once 'jdf.php';
require_once 'connectToDataBase.php';
$columns = $pdo->query("show columns from persons")->fetchAll(PDO::FETCH_OBJ);
$fields = [];
foreach ($columns as $column) {
    foreach ($column as $key =>$value) {
        if ($key === 'Field') {
         if ($value == 'id') continue;
        $fields[] = $value;
        }
    }
}
$fields[] = "update";
$fields[] = "delete";

$prepareStatement = $pdo->prepare("select * from persons");
$prepareStatement->execute();
$persons = $prepareStatement->fetchAll(PDO::FETCH_ASSOC);

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>person table data</title>
    </head>
    <body>
        <h3>person table data</h3>
        <a href="./addPerson.php">Add new to person list</a> <br><br>
        <table border="2">

            <tr>
                <?php
                foreach ($fields as $index =>$field) { ?>
                    <th><?=$field?></th>
                <?php }   ?>
            </tr>
            <?php foreach ($persons as $person) { ?>
                <tr>
                    <?php foreach ($person as $property => $value) {
                        if ($property === "createdAt" || $property === "updatedAt") { ?>
                            <td><?= jdate("Y/n/j", strtotime($value)); ?></td>
                        <?php } else if ($property !== 'id') { ?>
                            <td><?= $value; ?></td>
                        <?php }
                    } ?>
                    <td><a href="./updatePerson.php?id=<?=$person["id"]?>">update</a></td>
                    <td><a href="./deletePerson.php?id=<?=$person["id"]?>">delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
    </html>


