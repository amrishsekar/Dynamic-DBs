<?php

session_start();

require 'router.php';

$server = new router();

$server->post("/", "main");
$server->post("/dbForm", "dbForm");
$server->post("/createDb", "createDb");
$server->post("/tableForm", "tableForm");
$server->post("/createTable", "createTable");
$server->post("/viewTables", "viewTables");
$server->post("/fetchColumns", "fetchColumns");
$server->post("/insertValue","insertValue");
$server->route();