<?php
/**
 * Name: Jhakon Pappoe & Navtej Singh
 * Project: IT328 Dating website
 * Date:  3.19.18
 * Checking to see if the text is
 * empty if empty add error text
 * if theres no errors assign success
 */

function validText($text)
{
    return (!empty($text));
}

$errors = [];

if (!validText($text)) {
    $errors['text'] = "Please write idea" ;
}
$success = sizeof($errors) == 0;