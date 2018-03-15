<?php

/**
 * Class Member
 */
class Member{

    protected  $firstName;
    protected $lastName;
    protected  $email;


    /**
     * Member constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     */
    function  __construct($firstName, $lastName, $email)
    {
        $this->firstName=$firstName;
        $this->lastName=$lastName;
        $this->email=$email;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }


}