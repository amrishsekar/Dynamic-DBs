<?php

require 'model/userModel.php';

class userController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index()
    {
        $allDatabases = $this->userModel->dbLists();
        require 'view/home.php';
    }

    public function dbForm()
    {
        require 'view/dbCreationForm.php';
    }

    public function createDb($name)
    {
        $this->userModel->createDatabase($name);
    }

    public function tableForm()
    {
        $allDatabases = $this->userModel->dbLists();
        require 'view/tableCreationForm.php';
    }

    public function createTableAndColumn($details)
    {
        $dbname = $details['dbname'];
        $tableName = $details['tableName'];
        switch ($dbname)
        {
            case "common":
                echo '<script>alert("Select Database properly");</script>';
                break;
            default:
                $this->userModel->createTable($dbname, $tableName);
        }

        $columnName = $details['columnName'];
        $dataType = $details['datatype'];
        $count = count($columnName);

        for ($i = 0; $i < $count; $i++)
        {
            $this->userModel->createColumnsOnTable($dbname,$tableName,$columnName[$i],$dataType[$i]);
        }
    }

    public function viewTables($details)
    {
        $dbname = $details['dbname'];
        $_SESSION['dbname'] = $dbname;
        switch ($dbname)
        {
            case "common":
                echo '<script>alert("Select Database properly");</script>';
                break;
            default:
                $allTables = $this->userModel->fetchTable($dbname);
        }
        require 'view/tablesList.php';
    }

    public function fetchColumns($details)
    {
        $databaseName = $details['dbname'];
        $tableName = $details['tableName'];
        $_SESSION['tableName'] = $tableName;
        switch ($tableName)
        {
            case "common":
//                header('location: /viewTables');
                echo '<script>alert("Select table properly");</script>';
                break;
            default:
                $allColumns = $this->userModel->fetchAllColumns($databaseName, $tableName);
        }
        $allTables = $this->userModel->fetchTable($databaseName);
        require 'view/tablesList.php';
    }

    public function insertValue($data)
    {
        $dbname = $data['dbname'];
        $tableName = $data['tableName'];
        $col_name = $data['col_name'];
        $col_value = $data['col_value'];
        $count = count($col_name);

        $this->userModel->insertRowsOnTable($dbname, $tableName, $col_value[0]);

        for($i = 1; $i < $count; $i++)
        {
            $this->userModel->updateValuesOnTable($dbname, $tableName, $col_name[$i], $col_value[$i],$col_value[0]);
//          $this->userModel->updateValuesOnTable($dbname=>"database name", $tableName=>"table name", $col_name[$i]=>"column name", $col_value[$i]=>"column value",$col_value[0]=>"id");
        }
//        echo "<pre>";
//        var_dump($data);
//        echo "</pre>";
    }
}