<?php

namespace Model;

class Sculpture extends Art
{
    public function __construct($id, $name, $artist, $musId, $path)
    {
        parent::__construct($id, $name, $artist, $musId, $path);
    }


    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->name." was sculpted";
    }
}