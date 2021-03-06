<?php
/**
 * Name: Jhakon Pappoe & Navtej Singh
 * Project: IT328 Dating website
 * Date:  3.19.18
 * Index file/Login page redirection
 */

//error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

// add vendor autoload for dependence
require_once 'vendor/autoload.php';

// session start
session_start();

// add  database connection file
require_once 'model/dbconn.php';

// add fat free instance
$f3 = Base::instance();

//add classes for database
$database = new Dbconn();

$f3->set('DEBUG', 3);

//array for states
$f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
    'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota',
    'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'));

// set new join member and sign in
// add in database as new member
//  authorize to login  as database

// New member using their fname, lname,
// email and password
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

        if ($count == 1) {
            header("location:./home");
        }
    }

    $template = new Template();
    echo $template->render('/pages/login.html');
});

// create new member profile
//  add to datasbase
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

        session_destroy();

        header("location:./");
    }

    $template = new Template();
    echo $template->render('/pages/profile.html');
});

// view and update profile data to database
// set logout to destroy session
$f3->route('GET|POST  /view', function ($f3) {

    $navemail = $_SESSION['navemail'];
    global $database;
    $database->viewprofileaccess();

    $_SESSION['firstNam'] = $_SESSION['firstName1'];
    $_SESSION['lastNam'] = $_SESSION['lastName1'];
    $_SESSION['ag'] = $_SESSION['age1'];
    $_SESSION['gende'] = $_SESSION['gender1'];
    $_SESSION['sgende'] = $_SESSION['sgender1'];
    $_SESSION['state'] = $_SESSION['state1'];
    $_SESSION['phonenumbe'] = $_SESSION['phonenumber1'];
    $_SESSION['bio'] = $_SESSION['biography1'];
    $_SESSION['ema'] = $_SESSION['email1'];

    if (isset($_POST['update'])) {

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phonenumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $sgender = $_POST['sgender'];
        $state = $_POST['mystates'];
        $biography = $_POST['biography'];

        include "model/profilevalidate.php";

        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['age'] = $age;
        $_SESSION['email'] = $email;
        $_SESSION['phonenumber'] = $phonenumber;
        $_SESSION['gender'] = $gender;
        $_SESSION['sgender'] = $sgender;
        $_SESSION['state'] = $state;
        $_SESSION['biography'] = $biography;

        global $database;
        $database->updateprofile();
        $database->updatelogin();

        $_SESSION['firstNam'] = $_SESSION['firstName'];
        $_SESSION['lastNam'] = $_SESSION['lastName'];
        $_SESSION['ag'] = $_SESSION['age'];
        $_SESSION['gende'] = $_SESSION['gender'];
        $_SESSION['sgende'] = $_SESSION['sgender'];
        $_SESSION['stat'] = $_SESSION['state'];
        $_SESSION['phonenumbe'] = $_SESSION['phonenumber'];
        $_SESSION['bio'] = $_SESSION['biography'];
    }

    if (isset($_POST['done'])) {
        header("location:./home");
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        unset($_SESSION['navemail']);
        unset($_SESSION['email']);

        header("location:./");
    }
    $template = new Template();
    echo $template->render('/pages/viewprofile.html');
});

// add post to database and show on home page
$f3->route('GET|POST  /home', function ($f3) {

    global $database;
    global $firstName;
    global $lastName;
    $database->viewprofileaccess();

    $_SESSION['firstNam'] = $_SESSION['firstName1'];
    $_SESSION['lastNam'] = $_SESSION['lastName1'];
    $_SESSION['navemai'] = $_SESSION['navemail'];
    $_SESSION['email'] = $_SESSION['email'];

    $f3->set('fname', $firstName);
    $f3->set('lname', $lastName);

    if (isset($_POST['post'])) {
        $idea = $_POST['idea'];
        $email = $_SESSION['navemai'];

        include 'model/homeValidation.php';

        $_SESSION['idea'] = $idea;
        $_SESSION['navemail'] = $email;

        global $database;
        $database->insertPost();
    }
    global $database;
    $database->loginPost();
    $row = $_SESSION['row'];

    if (isset($_POST['logout'])) {
        {
            session_destroy();
            unset($_SESSION['navemail']);
            unset($_SESSION['email']);
        }
        header("location: ./");
    }
    $template = new Template();
    echo $template->render('/pages/home.php');
});

$f3->run();