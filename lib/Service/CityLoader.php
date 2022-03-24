<?php
//Namespace used for the autoloading function
namespace Service;
use Model\City;

//Loads the cities
class CityLoader implements LoaderInterface
{
    private $cityStorage;

    public function __construct(CityStorage $cityStorage)
    {
        $this->cityStorage = $cityStorage;
    }

    /**
     * @return City[]
     */
    public function getItems($extra="")
    {
        $citiesData = $this->cityStorage->fetchAllCitiesData();
        $cities = array();
        foreach ($citiesData as $cityData) {
            $cities[] = $this->createItemFromData($cityData);
        }
        return $cities;
    }

    /**
     * @param $id
     * @return City|null
     */
    public function getItemById($id){
        $citiesArray = $this->cityStorage->fetchSingleCityData($id);
        return $this->createItemFromData($citiesArray);
    }

    public function createItemFromData(array $data){
        $city = new City($data['img_id'],$data['img_filename'],$data['img_title'],$data['img_width'],$data['img_height'],$data['img_lan_id'],$data['img_date']);
        return $city;
    }
}