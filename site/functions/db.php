<?php

class db{
    private function getDBParams(){
        $app = require 'private.php';
        $dbconn = $app['database'];
        return $dbconn;
    }
    function execSQL($sql){
        try {
            $dbconn = $this->getDBParams();
            $conn = new PDO("mysql:host=$dbconn[servername];dbname=$dbconn[db]", $dbconn['username'], $dbconn['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            global $results;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        
    }
    function selectParamsSQL($sql, $param, $param2){
        try {
            $dbconn = $this->getDBParams();
            $conn = new PDO("mysql:host=$dbconn[servername];dbname=$dbconn[db]", $dbconn['username'], $dbconn['password']);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            global $results;
            $stmt = $conn->prepare($sql);
            $stmt->bindParam($param, $param2);
            $stmt->execute();
            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        
    }
}