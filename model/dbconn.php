<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Created by PhpStorm.
 * User: Navtej
 * Date: 3/13/2018
 * Time: 1:35 PM
 */

require '/home/nsinghvi/config.php';

class  Dbconn
{
    function addlogin()
    {
        try {
            $cnxn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $cnxn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $cnxn->prepare('INSERT INTO loginmembers(firstName,lastName,email,password) VALUES (:firstName,:lastName,:email,:password)');

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

            $statement = $cnxn->prepare('SELECT * FROM loginmembers where email=:email and password=:password');

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

            $statement = $cnxn->prepare('INSERT INTO profilemember(firstName,lastName,email,age,phonenumber,gender,sgender,state,biography) VALUES (:firstName,:lastName,:email,:age,:phonenumber,:gender,:sgender,:state,:biography)');

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

}