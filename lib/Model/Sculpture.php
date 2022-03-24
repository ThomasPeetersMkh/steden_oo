<?php
//Namespace used for the autoloading function
namespace Model;

class Sculpture extends Art
{
    public function __construct($id, $name, $artist, $musId, $path)
    {
        parent::__construct($id, $name, $artist, $musId, $path);
    }

    //Provides text to be printed in the HTML
    public function __toString(): string
    {
        return $this->name." was sculpted";
    }
}