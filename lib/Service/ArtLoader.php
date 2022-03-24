<?php
//Namespace used for the autoloading function
namespace Service;


use Model\Painting;
use Model\Sculpture;

//Loader for the Art classes
class ArtLoader implements LoaderInterface
{

    private $artStorage;

    public function __construct(ArtStorage $artStorage)
    {
        $this->artStorage = $artStorage;
    }

    public function getItems($extra="")
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
        if($data["type"]==="sculpture"){
            return new Sculpture($data['art_id'],$data['art_name'],$data['art_artist'],$data['art_mus_id'],$data['art_path']);
        }
        if($data["type"]==="painting"){
            return new Painting($data['art_id'],$data['art_name'],$data['art_artist'],$data['art_mus_id'],$data['art_path']);
        }
    }
}