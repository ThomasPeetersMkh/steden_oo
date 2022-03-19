<?php

namespace Model;

abstract class Art
{
    protected $id;
    protected $name;
    protected $artist;
    protected $musId;
    private $path;

    public function __construct($id, $name, $artist, $musId,$path)
    {
        $this->id = $id;
        $this->name = $name;
        $this->artist = $artist;
        $this->musId = $musId;
        $this->path = $path;
    }

    abstract public function __toString(): string;
    public function getDataAsArray(){
        $arr=[];
        foreach($this as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }
}