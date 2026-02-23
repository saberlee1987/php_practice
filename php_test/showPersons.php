<?php
global $pdo;
require_once 'jdf.php';
require_once 'connectToDataBase.php';
//$columns = $pdo->query("show columns from persons")->fetchAll(PDO::FETCH_OBJ);
//foreach ($columns as $column) {
//    foreach ($column as $key =>$value) {
//        if ($key === 'Field') {
//         if ($value == 'id') continue;
//        $fields[] = $value;
//        }
//    }
//}
$fields = [];
$fields[] = "نام";
$fields[] = "نام خانوادگی";
$fields[] = "کد ملی";
$fields[] = "سن";
$fields[] = "شماره همراه";
$fields[] = "ایمیل";
$fields[] = "تاریخ ایجاد";
$fields[] = "آخرین تاریخ به روز رسانی";

$prepareStatement = $pdo->prepare("select id,firstName,lastName,nationalCode,age,mobile,email,createdAt,updatedAt from persons order by id desc");
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
        <link rel="stylesheet" href="./bootstrap.rtl.min.css">
        <script src="./bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="./personPage.css">
        <title>person table data</title>
    </head>
    <body>
    <div class="container">
        <!-- هدر و دکمه افزودن -->
        <div class="d-flex justify-content-between align-items-center mt-3">
            <h3 class="text-primary"><i class="bi bi-people-fill"></i> لیست افراد</h3>
            <a href="./addPerson.php" class="btn btn-add">
                <i class="bi bi-plus-circle"></i> افزودن شخص جدید
            </a>
        </div>
        <!-- جدول اطلاعات -->
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <?php if ($field !== 'id'): // در صورت تمایل می‌توانید id را مخفی کنید ?>
                                <th><?= htmlspecialchars($field) ?></th>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <th>عملیات</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($persons as $person): ?>
                        <tr>
                            <?php foreach ($person as $property => $value): ?>
                                <?php if ($property === 'id') continue; // رد کردن id ?>
                                <?php if ($property === 'createdAt' || $property === 'updatedAt'): ?>
                                    <td><?= htmlspecialchars(jdate('Y/n/j', strtotime($value))) ?></td>
                                <?php else: ?>
                                    <td><?= htmlspecialchars($value) ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td>
                                <a href="./updatePerson.php?id=<?= $person['id'] ?>" class="btn btn-update btn-sm">
                                    <i class="bi bi-pencil-square"></i> ویرایش
                                </a>
                            </td>
                            <td>
                                <a href="./deletePerson.php?id=<?= $person['id'] ?>" class="btn btn-delete btn-sm" onclick="return confirm('آیا از حذف این شخص اطمینان دارید؟');">
                                    <i class="bi bi-trash"></i> حذف
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
    </html>


