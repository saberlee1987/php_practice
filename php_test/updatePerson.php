<?php
global $pdo;
require_once 'personDatabase.php';
require_once 'validationPerson.php';
require_once 'jdf.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>به‌روزرسانی اطلاعات شخص</title>
    <link rel="stylesheet" href="./bootstrap.rtl.min.css">
    <script src="./bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./personPage.css">
    <style>
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255,193,7,0.25);
        }
    </style>
</head>
<body>
    <?php
    $errorMessage = [];
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
        <?php }
    } else if ($method === "POST") {
        extract($_POST);
        $errorMessage = validatePerson($firstName, $lastName, $mobile, null, $email, $age);
        $id = $_GET["id"];
        $person = getPersonById($id);
        //var_dump($errorMessage);
        if (empty($errorMessage)) {
            updatePerson();
            header("Location: showPersons.php");
        }
    }
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <!-- دکمه بازگشت به لیست -->
                <div class="mb-3">
                    <a href="./showPersons.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-right"></i> بازگشت به لیست افراد
                    </a>
                </div>

                <div class="card">
                    <div class="card-header text-center">
                        <h4>ویرایش اطلاعات شخص</h4>
                    </div>
                    <div class="card-body">
                        <!-- در صورت نیاز به نمایش پیام خطا یا موفقیت می‌توان از آلرت استفاده کرد -->
                        <?php if (!empty($errorMessage)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    <?php foreach ($errorMessage as $error) {?>
                                        <li><?=htmlspecialchars($error)?></li>
                                    <?php }?>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post" novalidate>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($id ?? '') ?>">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">نام</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                           placeholder="نام" value="<?= htmlspecialchars($person['firstName'] ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName"
                                           placeholder="نام خانوادگی" value="<?= htmlspecialchars($person['lastName'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile" class="form-label">موبایل</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                           placeholder="موبایل" value="<?= htmlspecialchars($person['mobile'] ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nationalCode" class="form-label">کد ملی</label>
                                    <input type="text" class="form-control" name="nationalCode" id="nationalCode"
                                           readonly disabled value="<?= htmlspecialchars($person['nationalCode'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">ایمیل</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="ایمیل" value="<?= htmlspecialchars($person['email'] ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">سن</label>
                                    <input type="number" class="form-control" name="age" id="age"
                                           placeholder="سن" value="<?= htmlspecialchars($person['age'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="createdAt" class="form-label">تاریخ ایجاد</label>
                                    <input type="text" class="form-control" name="createdAt" id="createdAt"
                                           readonly disabled value="<?= htmlspecialchars(jdate('Y/n/j', strtotime($person['createdAt'] ?? '')) ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="updatedAt" class="form-label">تاریخ آخرین به‌روزرسانی</label>
                                    <input type="text" class="form-control" name="updatedAt" id="updatedAt"
                                           readonly disabled value="<?= htmlspecialchars(jdate('Y/n/j', strtotime($person['updatedAt'] ?? '')) ?? '') ?>">
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-warning btn-lg">به‌روزرسانی اطلاعات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>