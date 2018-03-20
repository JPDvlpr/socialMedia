
/*
validate fields
*/

<?php
/**
 * Created by PhpStorm.
 * User: Navtej
 * Date: 2/24/2018
 * Time: 7:59 PM
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

function validName($string)
{
    return (((!empty($string)) && (trim($string)) && ctype_alpha($string)));
}

function validemail($email)
{
    return ((filter_var($email, FILTER_VALIDATE_EMAIL)) && (!empty($email)));
}

function notemptypassword($password)
{
    return !empty($password);
}

function notemptyrepeatpassword($repeatpassword)
{
    return !empty($repeatpassword);
}


function validpassword($password, $repeatpassword)
{
    return $password == $repeatpassword;
}


$errors = [];

if (!notemptypassword($password)) {
    $errors['password'] = "Password should be choosein!";
}
if (!notemptypassword($repeatpassword)) {
    $errors['rpassword'] = "Password should be choosein!";
}
if (!validpassword($password, $repeatpassword)) {
    $errors['repeatpassword'] = "Please use same password";
}

if (!validName($firstName)) {
    $errors['firstName'] = "Please enter valid name";
}
if (!validName($lastName)) {
    $errors['lastName'] = "Please enter valid name";
}

if (!validemail($email)) {
    $errors["email"] = "Please enter valid email";
}

$success = sizeof($errors) == 0;
