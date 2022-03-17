<?php
namespace Service;
use Model\City;
class CityLoader
{
    private $cityStorage;

    public function __construct(CityStorage $cityStorage)
    {
        $this->cityStorage = $cityStorage;
    }

    /**
     * @return City[]
     */
    public function getCities()
    {
        $citiesData = $this->cityStorage->fetchAllCitiesData();
        $cities = array();
        foreach ($citiesData as $cityData) {
            $cities[] = $this->createCityFromData($cityData);
        }
        return $cities;
    }

    /**
     * @param $id
     * @return City|null
     */
    public function findOneById($id){
        $citiesArray = $this->cityStorage->fetchSingleCityData($id);
        return $this->createCityFromData($citiesArray);
    }

    private function createCityFromData(array $cityData){
        $city = new City($cityData['img_id'],$cityData['img_filename'],$cityData['img_title'],$cityData['img_width'],$cityData['img_height'],$cityData['img_lan_id'],$cityData['img_date']);
        return $city;
    }
}