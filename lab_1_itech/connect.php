<?php
    error_reporting(E_ALL);

    $db_driver = "mysql";
    $host = "localhost";
    $database =  "shop_online123";
    $dsn = "$db_driver:host=$host;dbname=$database";
    $username = "root";
    $password = "";

    try{
        $dbh = new PDO($dsn, $username, $password);
    }
    catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/";
        die();
    }
