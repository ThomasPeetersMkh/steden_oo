<?php
namespace Service;
use PDO;
use PDOException;

class DBManager
{
    private $logger;
    private $pdo;

    public function __construct($logger,$pdo)
    {
        $this->logger = $logger;
        $this->pdo = $pdo;
    }

    public function CreateConnection()
    {
        // Create and check connection
        try {
           return $conn = $this->pdo;
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function GetData( $sql )
    {
        $conn = $this->CreateConnection();

        //define and execute query
        $result = $conn->query( $sql );

        //show result (if there is any)
        if ( $result->rowCount() > 0 )
        {
            //$rows = $result->fetchAll(PDO::FETCH_ASSOC); //geeft array zoals ['lan_id'] => 1, ...
            //$rows = $result->fetchAll(PDO::FETCH_NUM); //geeft array zoals [0] => 1, ...
            $rows = $result->fetchAll(PDO::FETCH_BOTH); //geeft array zoals [0] => 1, ['lan_id'] => 1, ...
            //var_dump($rows);
            return $rows;
        }
        else
        {
            return [];
        }

    }

    public function ExecuteSQL( $sql )
    {
        $conn = $this->CreateConnection();

        //define and execute query
        $result = $conn->query( $sql );

        return $result;
    }

}