<?php
class db{
    // Get database parameters from env.ini
    private function getDBParams(){
        $app = parse_ini_file("env.ini", true);
        $dbconn = $app['database'];
        return $dbconn;
    }
    
    //Connect to database with PDO and return connection 
    // function SQLConnectDB(){
    //     $dbconn = $this->getDBParams();
    //     $conn = new PDO("mysql:host=$dbconn[servername];dbname=$dbconn[db]", $dbconn['username'], $dbconn['password']);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     return $conn;
    // }

    // Connect to database with PDO and return connection if database exists, else create database and return connection
    function SQLConnectDB(){
        $dbconn = $this->getDBParams();
        $conn = new PDO("mysql:host=$dbconn[servername]", $dbconn["username"], $dbconn["password"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($conn->query("SELECT * FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = '$dbconn[db]'")->rowCount() > 0) {
        $conn = new PDO("mysql:dbname=$dbconn[db];host=$dbconn[servername]", $dbconn["username"], $dbconn["password"]);
        } else {
            $file = file_get_contents('dbFiles/profileapp.sql', FALSE, NULL);
            $sql = "CREATE DATABASE $dbconn[db]";
            $conn->exec($sql);
            $conn = null;
            $conn = new PDO("mysql:dbname=$dbconn[db];host=$dbconn[servername]", $dbconn["username"], $dbconn["password"]);
            $conn->exec($file);
        }
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
    
    // Select from database with parameters and return results
    function SQLReturnResultWithParams($sql, $param, $var){
        try {
            $conn = $this->SQLConnectDB();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam($param, $var);
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