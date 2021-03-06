<?php
/**
 * Name: Jhakon Pappoe & Navtej Singh
 * Project: IT328 Dating website
 * Date:  3.19.18
 * Database connect class with functions
 * Creating connections, sotring sessions
 * binding params and using try/catch
 */

//error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

//connection to database
require '/home/jpappoeg/config1.php';

/*
 * define class as DBconn
 *
 * define function addlogin->add login member to database
 * define function verifylogin->verify login member with email and password to database
 * define function memberprofile->add  member detail to database
 * define function viewprofile access->view profile as member to database
 * define function updateprofile->add change in profile as member to database
 * define function addlogin->add login member to database
 * define function insertpost->add post  to database
 * define function loginpost->add post  to database when as existing account
 *
 *
 */


class  Dbconn
{
    function addlogin()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('INSERT INTO loginmembers(firstName,lastName,email,password)
            VALUES (:firstName,:lastName,:email,:password)');

            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];

            $statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            $statement->execute();
        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function verifylogin()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('SELECT * FROM loginmembers where email=:email 
            and password=:password');

            $email = $_SESSION['navemail'];
            $password = $_SESSION['navpassword'];

            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);

            $statement->execute();
            $count = $statement->rowCount();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['count'] = $count;
            $_SESSION['row'] = $row;

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function memberprofile()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('INSERT INTO profilemember(firstName,lastName,email,age,
            phonenumber,gender,sgender,state,biography) VALUES (:firstName,:lastName,:email,:age,:phonenumber,
            :gender,:sgender,:state,:biography)');

            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $email = $_SESSION['email'];
            $age = $_SESSION['age'];
            $phonenumber = $_SESSION['phonenumber'];
            $gender = $_SESSION['gender'];
            $sgender = $_SESSION['sgender'];
            $state = $_SESSION['state'];
            $biography = $_SESSION['biography'];

            $statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
            $statement->bindParam(':age', $age, PDO::PARAM_STR);
            $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
            $statement->bindParam(':sgender', $sgender, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':biography', $biography, PDO::PARAM_STR);

            $statement->execute();
        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function viewprofileaccess()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $navemail1 = $_SESSION['navemail'];

            $statement = $cnxn->prepare('select *  from profilemember,memberpost where 
            profilemember.email=:navemail ');

            $navemail = $navemail1;

            $statement->bindParam(":navemail", $navemail, PDO::PARAM_STR);
            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($row as $result) {
                $_SESSION['firstName1'] = $result['firstName'];
                $_SESSION['lastName1'] = $result['lastName'];
                $_SESSION['age1'] = $result['age'];
                $_SESSION['phonenumber1'] = $result['phonenumber'];
                $_SESSION['gender1'] = $result['gender'];
                $_SESSION['sgender1'] = $result['sgender'];
                $_SESSION['email1'] = $result['email'];
                $_SESSION['state1'] = $result['mystates'];
                $_SESSION['biography1'] = $result['biography'];
                $_SESSION['email'] = $result['email'];
            }
        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updateprofile()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $navemail1 = $_SESSION['navemail'];

            $statement = $cnxn->prepare('UPDATE profilemember SET firstName=:firstName,
            lastName=:lastName,age=:age,phonenumber=:phonenumber,gender=:gender,sgender=:sgender,state=:state,
            biography=:biography WHERE email=:navemail');

            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $age = $_SESSION['age'];
            $phonenumber = $_SESSION['phonenumber'];
            $gender = $_SESSION['gender'];
            $sgender = $_SESSION['sgender'];
            $state = $_SESSION['state'];
            $biography = $_SESSION['biography'];
            $navemail = $navemail1;

            $statement->bindParam(":navemail", $navemail, PDO::PARAM_STR);
            $statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
            $statement->bindParam(':age', $age, PDO::PARAM_STR);
            $statement->bindParam(':gender', $gender, PDO::PARAM_STR);
            $statement->bindParam(':sgender', $sgender, PDO::PARAM_STR);
            $statement->bindParam(':state', $state, PDO::PARAM_STR);
            $statement->bindParam(':biography', $biography, PDO::PARAM_STR);

            $statement->execute();

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insertPost()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('INSERT INTO memberpost(email,post) VALUES (:email,:post)');

            $email = $_SESSION['navemail'];
            $idea = $_SESSION['idea'];

            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':post', $idea, PDO::PARAM_STR);


            $statement->execute();
        } catch
        (PDOException $e) {
//            echo $e->getMessage();

        }
    }

    function loginPost()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('SELECT * from memberpost,loginmembers where
            memberpost.email=loginmembers.email  order by postid DESC  limit 7');

            $statement->execute();
            $row = $statement->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['row'] = $row;

        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function updatelogin()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $navemail1 = $_SESSION['navemail'];

            $statement = $cnxn->prepare('UPDATE loginmembers SET firstName=:firstName,
            lastName=:lastName WHERE email=:navemail');

            $firstName = $_SESSION['firstName'];
            $lastName = $_SESSION['lastName'];
            $navemail = $navemail1;

            $statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':navemail', $navemail, PDO::PARAM_STR);

            $statement->execute();
        } catch
        (PDOException $e) {
            echo $e->getMessage();
        }
    }
}