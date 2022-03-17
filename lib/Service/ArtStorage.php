<?php

namespace Service;

use PDO;

class ArtStorage
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function fetchAllArtsData()
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM art');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchSingleArtData($id)
    {
        $pdo = $this->pdo;
        $statement = $pdo->prepare('SELECT * FROM art WHERE art_id= :id');
        $statement->execute(array('id' => $id));
        $cityArray = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$cityArray) {
            return null;
        }
        return $cityArray;
    }
}