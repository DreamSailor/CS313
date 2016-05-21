<?php

/**************************************
 * 
 *  File: dbaccess.php
 *  Created by: jsimpson
 *  Date: May 18, 2016 7:01:44 PM
 *  Description:
 * 
 ****************************************/




/**************************************
 * 
 *  Function:  openDB()
 *  Descript:   Generical Function to open DB local or otherwise
 * 
 ****************************************/

function openDB($dbname)
{

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
        // Not in the openshift environment
        $servername = "localhost";
        $username = "php";
        $password = "php-login";
      
    }
    else 
    { 
        // In the openshift environment
        $servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');        
          
    } 

// Create connection
    try 
    {          
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
    } catch (Exception $ex) 
    {
        echo "Connection failed: " . $ex->getMessage();
        die();
    }

return $db;

}