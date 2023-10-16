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
    function SQLReturnResult($sql){
        try {
            $conn = $this->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchall(PDO::FETCH_ASSOC);
            //return results as array
            return $results;
          } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
        $conn = null;
    }
    // Insert into database
    function SQLNoResult($sql){
        try {
            $conn = $this->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } catch(PDOException $e){
            echo $sql . "<BR>" . $e->getMessage();
        }
        $conn = null;
    }        
}