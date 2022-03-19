<?php

namespace Model;

class Painting extends Art
{
    public function __construct($id, $name, $artist, $musId, $path)
    {
        parent::__construct($id, $name, $artist, $musId, $path);
    }


    public function __toString(): string
    {
        return $this->name." was painted";
    }
}