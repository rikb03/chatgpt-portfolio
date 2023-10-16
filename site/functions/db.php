<?php
class db{
    // Get database parameters from private.php 
    private function getDBParams(){
        $app = require 'private.php';
        $dbconn = $app['database'];
        return $dbconn;
    }
    // Connect to database with PDO and return connection 
    function SQLConnectDB(){
        $dbconn = $this->getDBParams();
        $conn = new PDO("mysql:host=$dbconn[servername];dbname=$dbconn[db]", $dbconn['username'], $dbconn['password']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    // Select from database and return results
    function SQLSelect($sql){
        try {
            $conn = $this->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            global $results;
            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        $conn = null;
    }
    // Insert into database
    function SQLInsert($sql){
        try {
            $conn = $this->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        $conn = null;
    }        
}