<?php
class DB{

    private $dbname = null , $dbhost = null , $dbpass = null , $dbuser = null , $con = null;
    private static $instance = null;

    private function __construct()
    {
        $this->dbname = 'attendence';
        $this->dbhost = 'localhost';
        $this->dbpass = '';
        $this->dbuser = 'root';
        $this->con = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->con;
    }
}


function js_exit($message) {
    $json = [
        "errorMessage" => $message,
    ];
    exit(json_encode($json));
}

function conectioncheck(){
    $instance = DB::getInstance();
    $connection = $instance->getConnection();
    if (!$connection) {
        js_exit("wrong connection"); }
    else {
        return $connection;
    }
}
