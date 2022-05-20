<?php
namespace Test;

class Hello {

    private $id;
    private $username;
    private $password;

    public function __construct($id,$username,$password)
    {
        $this->setId($id);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $username
     */

    public function setUsername($username): void
    {
        $this->username = $username;
    }
}