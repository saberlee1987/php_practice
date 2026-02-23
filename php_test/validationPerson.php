<?php
/**
 * @param string $firstName
 * @param array $errorMessage
 * @param string $lastName
 * @param string $mobile
 * @param string $nationalCode
 * @param string $email
 * @param int|string $age
 * @return array
 */
function validatePerson(string $firstName, string $lastName, string $mobile, string|null $nationalCode, string $email, int|string $age): array
{
    $errorMessage =[];
    //validation
    if (empty($firstName)) $errorMessage[] = "نام الزامی است ";
    if (empty($lastName)) $errorMessage[] = "نام خانوادگی الزامی است ";
    if (empty($mobile)) $errorMessage[] = "موبایل الزامی است ";
    if (!str_starts_with($mobile, "09") || strlen($mobile) != 11)
        $errorMessage[] = "موبایل معتبر نیست ";
    if ($nationalCode !=null) {
        if (empty($nationalCode)) $errorMessage[] = "کد ملی الزامی است ";
        if (strlen($nationalCode) != 10) $errorMessage[] = "کد ملی معتبر نیست";
    }
    if (empty($email)) $errorMessage[] = "ایمیل الزامی است ";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errorMessage[] = "ایمیل معتبر نیست ";
    if (empty($age)) $errorMessage[] = "سن الزامی است ";
    return $errorMessage;
}