<?php
//Namespace used for the autoloading function
namespace Service;
use PDO;

//Contains all the services classes to avoid running more than one instance of a Service object
class Container{

    private $configuration;

    private $pdo;

    private $cityLoader;

    private $cityStorage;

    private $logger;

    private $DBManager;

    private $makeHTML;

    private $makeForm;

    private $loginChecker;

    private $security;

    private $sanitize;

    private $saveForm;

    private $validate;

    private $artStorage;

    private $artLoader;

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

    public function getLogger(){
        if($this->logger === null){
            $this->logger = new Logger("log.txt");
        }
        return $this->logger;
    }

    public function getDBManager()
    {
        if($this->DBManager===null){
            $this->DBManager = new DBManager($this->getLogger(),$this->getPDO());
        }
        return $this->DBManager;
    }

    /**
     * @return MakeHTML
     */
    public function getMakeHTML()
    {
        if($this->makeHTML === null){
            $this->makeHTML = new MakeHTML();
        }
        return $this->makeHTML;
    }
    public function getMakeForm()
    {
        if($this->makeForm === null){
            $this->makeForm = new MakeForm();
        }
        return $this->makeForm;
    }

    /**
     * @return mixed
     */
    public function getLoginChecker()
    {
        if($this->loginChecker === null){
            $this->loginChecker = new LoginChecker($this->getDBManager(),$this->getSanitize());
        }
        return $this->loginChecker;
    }

    /**
     * @return mixed
     */
    public function getSecurity()
    {
        if($this->security === null){
            $this->security = new Security();
        }
        return $this->security;
    }

    /**
     * @return mixed
     */
    public function getSanitize()
    {
        if($this->sanitize === null){
            $this->sanitize = new Sanitize();
        }
        return $this->sanitize;
    }

    /**
     * @return mixed
     */
    public function getSaveForm()
    {
        if($this->saveForm === null){
            $this->saveForm = new SaveForm($this->getDBManager(),$this->getSanitize(),$this->getValidate());
        }
        return $this->saveForm;
    }

    /**
     * @return mixed
     */
    public function getValidate()
    {
        if($this->validate === null){
            $this->validate = new Validate($this->getLogger(),$this->getDBManager());
        }
        return $this->validate;
    }

    /**
     * @return mixed
     */
    public function getArtStorage()
    {
        if($this->artStorage === null) {
            $this->artStorage = new ArtStorage($this->getPDO());
        }
        return $this->artStorage;
    }

    /**
     * @return mixed
     */
    public function getArtLoader()
    {
        if($this->artLoader === null) {
            $this->artLoader = new ArtLoader($this->getArtStorage());
        }
        return $this->artLoader;
    }
}