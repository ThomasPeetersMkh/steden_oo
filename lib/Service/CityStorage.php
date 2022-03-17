<?php
namespace Service;
use PDO;
use Model\City;

class CityStorage
{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function fetchAllCitiesData(){
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM image');
        $statement->execute();
        $cityArray = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cityArray;
    }
    public function fetchSingleCityData($id){
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM image WHERE img_id= :id');
        $statement->execute(array('id'=>$id));
        $cityArray = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$cityArray){
            return null;
        }
        return $cityArray;
    }
}