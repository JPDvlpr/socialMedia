<?php

function validAge($age)
{
    return (is_numeric($age) && ($age >= 18) && (!empty($age)));
}

function validgender($gender)
{
    return $gender;
}

function validsgender($sgender)
{
    return $sgender;
}

function validbiography($biography)
{
    return (!empty($biography) && trim($biography));
}

function validstates($state)
{
    global $f3;
    return in_array($state, $f3->get('states'));
}

function validPhone($phonenumber)
{
    return (is_numeric($phonenumber) && preg_match("/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/", $phonenumber) && (!empty($phonenumber)));
}

$errors = [];
if(!validstates($state)){
    $errors['state']="Please select state";
}

if (!validPhone($phonenumber)) {
    $errors['phonenumber'] = "Please Enter valid Phone Number";
}

if (!validsgender($sgender)) {
    $errors['sgender'] = "Please select gender";
}

if (!validbiography($biography)) {
    $errors['biography'] = "Please Enter About You";
}

if (!validAge($age)) {
    $errors['age'] = "Please Enter valid  Age";
}

if (!validgender($gender)) {
    $errors['gender'] = "Please select gender";
}


$success = sizeof($errors) == 0;
