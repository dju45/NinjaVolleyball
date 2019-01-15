<?php



class User
{

    private $id;

    private $userName;

    private $age;

    public function getId()
    {
        return $this->id;
    }

    public function setUserName(string $userName)
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setAge(int $age)
    {
        $this->age = $age;

        return $this;
    }

    public function getAge()
    {
        return $this->age;
    }
}
