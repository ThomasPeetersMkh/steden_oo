<?php

namespace Service;

interface LoaderInterface
{
    public function getItems();
    public function getItemById($id);
    public function createItemFromData(array $data);
}