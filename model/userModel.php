<?php

class database{
    public $db;

    public function __construct()
    {
        try{
            $this->db = new PDO('mysql:host=localhost','admin','welcome');
        }
        catch (exception $e){;
            die("connection error".$e->getMessage());
        }
    }
}

class userModel extends database {

    public function createDatabase($databaseName)
    {
        $dbname = $databaseName['createDB'];

        try
        {
            $this->db->query("CREATE DATABASE $dbname");
            header('location: /');
        }
        catch (PDOException $e)
        {
            die("Creation Failed: ".$e->getMessage());
        }
    }

    public function dbLists()
    {
        try
        {
            $fetchDatabases = $this->db->query("SHOW DATABASES");
            return $fetch = $fetchDatabases->fetchAll(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            die("Database fetching failed :".$e->getMessage());
        }
    }

    public function createTable($dbname, $tableName)
    {
        try
        {
            $this->db->query("USE `$dbname`");
            $this->db->query("CREATE TABLE `$tableName`(id int AUTO_INCREMENT PRIMARY KEY)");
        }
        catch (PDOException $e)
        {
            die("Table creation failed :".$e->getMessage());
        }
    }

    public function createColumnsOnTable($dbname,$tableName,$columnName,$dataType)
    {
        try
        {
            $this->db->query("USE $dbname");
            $query = "ALTER TABLE $tableName ADD COLUMN $columnName $dataType";
            $this->db->query($query);
            header('location: /');
        }
        catch (PDOException $e)
        {
            die("Columns creation failed :".$e->getMessage());
        }
    }

    public function fetchTable($dbname)
    {
        try
        {
            $this->db->query("USE $dbname");
            $fetchTables = $this->db->query("SHOW TABLES");
            return $fetch = $fetchTables->fetchAll(PDO::FETCH_COLUMN);
        }
        catch (PDOException $e)
        {
            die("Tables fetching failed :".$e->getMessage());
        }
    }

    public function fetchAllColumns($databaseName, $tableName)
    {
        try
        {
            $this->db->query("USE $databaseName");
            $fetchTables = $this->db->query("SHOW COLUMNS FROM $tableName");
            return $fetch = $fetchTables->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e)
        {
            die("Tables fetching failed :".$e->getMessage());
        }
    }

    public function insertValuesOnTable($dbname, $tableName, $columns, $values)
    {
        try
        {
            $this->db->query("USE $dbname");
            $this->db->query("INSERT INTO $tableName($columns) VALUES ($values)");
            echo "<pre>";
            var_dump($dbname, $tableName, $columns,$values);
            echo "</pre>";
        }
        catch (Exception $e)
        {
            die("Rows Insertion failed :".$e->getMessage());
        }

//        try {
//            $this->db->query("USE $dbname");
//
//            // Prepare the column names and values
//            $columnNames = implode(', ', $col_name);
//            $valuePlaceholders = implode(', ', array_fill(0, count($col_value), '?'));
//
//            // Construct the SQL query with parameter binding
//            $query = "INSERT INTO $tableName ($columnNames) VALUES ($valuePlaceholders)";
//            $stmt = $this->db->prepare($query);
//            $stmt->execute($col_value);
//        } catch (Exception $e) {
//            die("Rows Insertion failed: " . $e->getMessage());
//        }
    }
}