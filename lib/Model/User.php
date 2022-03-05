<?php

class User
{
    private $userId;
    private $userFN;
    private $userLN;
    private $userEmail;
    private $userPass;

    public function __construct($userId,$userFN,$userLN,$userEmail,$userPass)
    {
        $this->userId = $userId;
        $this->userFN = $userFN;
        $this->userLN = $userLN;
        $this->userEmail = $userEmail;
        $this->userPass = $userPass;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param integer $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getUserFN()
    {
        return $this->userFN;
    }

    /**
     * @param string $userFN
     */
    public function setUserFN($userFN): void
    {
        $this->userFN = $userFN;
    }

    /**
     * @return string
     */
    public function getUserLN()
    {
        return $this->userLN;
    }

    /**
     * @param string $userLN
     */
    public function setUserLN($userLN): void
    {
        $this->userLN = $userLN;
    }

    /**
     * @return string
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     */
    public function setUserEmail($userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return string
     */
    public function getUserPass()
    {
        return $this->userPass;
    }

    /**
     * @param string $userPass
     */
    public function setUserPass($userPass): void
    {
        $this->userPass = $userPass;
    }


}