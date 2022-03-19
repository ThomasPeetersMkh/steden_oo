<?php

namespace Service;

interface LoaderInterface
{
    public function getItems($extra="");

    public function getItemById($id);

    public function createItemFromData(array $data);
}