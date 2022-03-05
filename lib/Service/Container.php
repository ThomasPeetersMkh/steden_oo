<?php

class Container{

    private $configuration;

    private $pdo;

    private $cityLoader;

    private $cityStorage;

    public function __construct(array $configuration){
        $this->configuration = $configuration;
    }
    /**
     * @return PDO
     */
    public function getPDO(){
        if($this->pdo===null){
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    /**
     * @return CityLoader
     */
    public function getCityloader(){
        if($this->cityLoader === null){
            $this->cityLoader = new CityLoader($this->getCityStorage());
        }
        return $this->cityLoader;
    }

    /**
     * @return CityStorage
     */
    public function getCityStorage()
    {
        if ($this->cityStorage === null) {
            $this->cityStorage = new CityStorage($this->getPDO());
            //$this->cityStorage = new JsonFileShipStorage(__DIR__.'/../../resources/ships.json');
        }
        return $this->cityStorage;
    }
}