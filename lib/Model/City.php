<?php
namespace Model;
class City
{
    private $id;
    private $filename;
    private $title;
    private $width;
    private $height;
    private $countryId;
    private $date;

    public function __construct($id, $filename, $title, $width, $height, $countryId, $date)
    {
        $this->id = $id;
        $this->filename = $filename;
        $this->title = strtoupper($title);
        $this->width = $width;
        $this->height = $height;
        $this->countryId = $countryId;
        $this->date = $date;
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
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename($filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param integer $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param integer $countryId
     */
    public function setCountryId($countryId): void
    {
        $this->countryId = $countryId;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    public function getDataAsArray(){
        $arr=[];
            foreach($this as $key => $value) {
                $arr[$key] = $value;
            }
            return $arr;
    }
}