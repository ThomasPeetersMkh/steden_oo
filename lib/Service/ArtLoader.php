<?php

namespace Service;


class ArtLoader implements LoaderInterface
{

    private $artStorage;

    public function __construct(ArtStorage $artStorage)
    {
        $this->artStorage = $artStorage;
    }

    public function getItems($extra)
    {
        $citiesData = $this->artStorage->fetchAllArtsData($extra);
        $cities = array();
        foreach ($citiesData as $cityData) {
            $cities[] = $this->createItemFromData($cityData);
        }
        return $cities;
    }

    public function getItemById($id)
    {
        $artArray = $this->artStorage->fetchSingleArtData($id);
        return $this->createItemFromData($artArray);
    }

    public function createItemFromData(array $data)
    {
        if($data["type"]==="statue")
        return new Art();
    }
}