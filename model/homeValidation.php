
//validate php text of post

<?php

function validText($text)
{
    return (!empty($text));
}

$errors = [];

if (!validText($text)) {
    $errors['text'] = "Please write idea" ;
}
$success = sizeof($errors) == 0;