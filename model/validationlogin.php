<?php
/**
 * Name: Jhakon Pappoe & Navtej Singh
 * Project: IT328 Dating website
 * Date:  3.19.18
 * Login validation functions
 * including email and password
 */

function validnavemail($navemail)
{
    return ((filter_var($navemail, FILTER_VALIDATE_EMAIL)) && (!empty($navemail)));
}

function nemptypassword($navpassword)
{
    return !empty($navpassword);
}

$errors = [];

if (!nemptypassword($navpassword)) {
    $errors['navpassword'] = "Please use your password!";
}
if (!validnavemail($navemail)) {
    $errors["navemail"] = "Please enter valid email";
}

if(!nemptypassword($navpassword) || !validnavemail($navemail) ){
    $errors['signin']="Click  Sign in";
}
$success = sizeof($errors) == 0;
?>