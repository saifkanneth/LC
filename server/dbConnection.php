<?php

class DBConnection {

    private static $instance;
    private $dbConn;
    private function __construct() {}

    public static function getInstance(){
        if (self::$instance == null){
            $className = __CLASS__;
            self::$instance = new $className;
        }

        return self::$instance;
    }
    private static function initConnection(){
        $db = self::getInstance();
       // $connConf = getConfigData();
        $db->dbConn = new mysqli("localhost", "root","","lc");
        $db->dbConn->set_charset('utf8');
        return $db;
    }
    public static function getDbConn() {
        try {
            $db = self::initConnection();
            return $db->dbConn;
        } catch (Exception $ex) {
            echo "I was unable to open a connection to the database. " . $ex->getMessage();
            return null;
        }
    }
}

?>