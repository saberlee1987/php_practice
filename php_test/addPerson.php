<?php
global $pdo;
require_once 'personDatabase.php';
require_once 'validationPerson.php';
$method = $_SERVER['REQUEST_METHOD'];
$firstName = "";
$lastName = "";
$mobile = "";
$nationalCode = "";
$email = "";
$age = "";
$errorMessage = [];
if ($method === 'POST') {
    extract($_POST);
    $errorMessage = validatePerson($firstName, $lastName, $mobile, $nationalCode, $email, $age);
    if (!$errorMessage) {
        $personByNationalCode = getPersonByNationalCode($nationalCode);
        if ($personByNationalCode) {
            $errorMessage[] = " شخصی با کد ملی  $nationalCode  در سامانه یافت شد ";
        } else {
            savePerson();
            header("Location: showPersons.php");
        }
    }
}
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
    <title>افزودن شخص جدید</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <!-- دکمه بازگشت به لیست -->
                <div class="mb-3">
                    <a href="./showPersons.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-right"></i> بازگشت به لیست افراد
                    </a>
                </div>

                <div class="card">
                    <div class="card-header text-center">
                        <h4>افزودن شخص جدید</h4>
                    </div>
                    <div class="card-body">
                        <!-- نمایش پیام خطا -->
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">نام</label>
                                    <input type="text" class="form-control" name="firstName" id="firstName"
                                           placeholder="نام" value="<?= htmlspecialchars($firstName ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">نام خانوادگی</label>
                                    <input type="text" class="form-control" name="lastName" id="lastName"
                                           placeholder="نام خانوادگی" value="<?= htmlspecialchars($lastName ?? '') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mobile" class="form-label">موبایل</label>
                                    <input type="text" class="form-control" name="mobile" id="mobile"
                                           placeholder="موبایل" value="<?= htmlspecialchars($mobile ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nationalCode" class="form-label">کد ملی</label>
                                    <input type="text" class="form-control" name="nationalCode" id="nationalCode"
                                           placeholder="کد ملی" value="<?= htmlspecialchars($nationalCode ?? '') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">ایمیل</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="ایمیل" value="<?= htmlspecialchars($email ?? '') ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">سن</label>
                                    <input type="number" class="form-control" name="age" id="age"
                                           placeholder="سن" value="<?= htmlspecialchars($age ?? '') ?>">
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">ثبت شخص</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
