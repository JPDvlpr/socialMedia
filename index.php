<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once 'vendor/autoload.php';
session_start();
require_once 'dbconn.php';
$f3 = Base::instance();
$database = new Dbconn();
$f3->set('DEBUG', 3);

//array for states
$f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota',
    'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'));

$f3->route('GET|POST  /', function ($f3) {
    {
        if (isset($_POST['joinnow'])) {

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatpassword = $_POST['repeatPassword'];

            include 'model/validation.php';

            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $f3->set("errors", $errors);
            $f3->set("success", $success);
        }
        if ($success) {
            global $database;
            $database->addlogin();
            header("location:./profile");
        }
    }

    if (isset($_POST['signin'])) {

        $navemail = $_POST['navemail'];
        $navpassword = $_POST['navpassword'];

        include 'model/validationlogin.php';

        $_SESSION['navemail'] = $navemail;
        $_SESSION['navpassword'] = $navpassword;
        $f3->set("errors", $errors);
        $f3->set("success", $success);

        global $database;
        $database->verifylogin();

        $count = $_SESSION['count'];
        $row = $_SESSION['row'];

        if ($count == 1 && $success) {
            header("location:./profile");
        }
    }

    $template = new Template();
    echo $template->render('/pages/login.html');
});


$f3->route('GET|POST  /profile', function ($f3) {

    if (isset($_POST['createProfile'])) {

        $age = $_POST['age'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $sgender = $_POST['sgender'];
        $state = $_POST['mystates'];
        $biography = $_POST['biography'];

        include 'model/profilevalidate.php';

        $_SESSION['age'] = $age;
        $_SESSION['phonenumber'] = $phonenumber;
        $_SESSION['gender'] = $gender;
        $_SESSION['sgender'] = $sgender;
        $_SESSION['state'] = $state;
        $_SESSION['biography'] = $biography;

        $f3->set('state', $state);
        $f3->set('biography', $biography);
        $f3->set('age', $age);
        $f3->set('phonenumber', $phonenumber);
        $f3->set('sgender', $sgender);
        $f3->set('gender', $gender);
        $f3->set("errors", $errors);
        $f3->set("success", $success);
        $firstName = $_SESSION['firstName'];
        $lastName = $_SESSION['lastName'];
        $email = $_SESSION['email'];
    }
    global $database;
    $database->memberprofile();

    if ($success) {
        header("location:./viewprofile.html");
    }

    $template = new Template();
    echo $template->render('/pages/profile.html');

});

$f3->run();