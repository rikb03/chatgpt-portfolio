<?php
/**
 * Created by: Stephan Hoeksema 2023
 * SL01COL04
 */

class Connection
{
    public $conn;
    private function getDBParams(){
        $app = parse_ini_file("env.ini", true);
        $dbconn = $app['database'];
        return $dbconn;
    }
    function __construct() {

        try {
            $dbconn = $this->getDBParams();
            $this->conn = new PDO("mysql:host=$dbconn[servername]", $dbconn['username'], $dbconn['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($this->conn->query("SELECT * FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$dbconn[db]'")->rowCount() > 0) {
                $this->conn = new PDO("mysql:dbname=$dbconn[db];host=$dbconn[servername]", $dbconn['username'], $dbconn['password']);
            } else {
                $file = file_get_contents('dbFiles/profileapp.sql', FALSE, NULL);
                $sql = "CREATE DATABASE $dbconn[db]";
                $this->conn->exec($sql);
                $this->conn = null;
                $this->conn = new PDO("mysql:dbname=$dbconn[db];host=$dbconn[servername]", $dbconn['username'], $dbconn['password']);
                $this->conn->exec($file);
            }
            $this->conn->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
            return $this->conn;
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}