<?php
//Namespace used for the autoloading function
namespace Service;

//Interface for the Loader classes
interface LoaderInterface
{
    public function getItems($extra="");

    public function getItemById($id);

    public function createItemFromData(array $data);
}