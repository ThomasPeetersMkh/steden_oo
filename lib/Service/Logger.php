<?php
//Namespace used for the autoloading function
namespace Service;

//Used to log certain SQL statements and errors
class Logger
{
    private $fp;
    private $logfile;

    public function __construct($logfile)
    {
        $this->logfile = $logfile;
        $this->fp = fopen( $this->logfile,"a+");
    }

    public function Log($msg){
        fwrite($this->fp,$msg ."\r\n");
    }
    public function showLog(){
        return file_get_contents($this->logfile);
    }
}