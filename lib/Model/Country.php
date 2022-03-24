<?php
//Namespace used for the autoloading function
namespace Model;

//Makes a country if it's needed
class Country
{
    private $id;
    private $country;

    public function __construct($id, $country)
    {
        $this->id = $id;
        $this->country = $country;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

}