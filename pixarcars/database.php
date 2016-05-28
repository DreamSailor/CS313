<?php

/**************************************
 * 
 *  File: database.php
 *  Created by: jsimpson
 *  Date: May 18, 2016 7:01:44 PM
 *  Description: Database Access and functions
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

function dbRead($db,$sqlQuery)
{
    try
    {
        //Build PDO statement and fetch it from DB
        $statement = $db->query($sqlQuery);         
        $dbInfo =  $statement->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $ex) 
    {
        echo "Db Error: " . $ex->getMessage();
        die();
    }
        
    
    return $dbInfo;
}

function deleteDbrecord()
{ 
    $db = openDB("pixar_cars");
    $carIndex = $_SESSION["currRecord"];  
      
    if(isset($carIndex))
    {
       $imageInfo = dbRead($db,"SELECT folderpath, name FROM image WHERE car_id=$carIndex"); 
       $imageFile = $imageInfo[0]["folderpath"] ."/" .$imageInfo[0]["name"];

       //delete image file
       if(file_exists ($imageFile ))
            unlink($imageFile);            
   
 
            //delete DB record
        try {

            // sql to delete a record
            $sql = "DELETE FROM cars WHERE id=$carIndex";

            $db->exec($sql);

            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage();
            }  
        
    }
    else
        echo "Error: No Record to get";
    
    //close db
    $db = null;
    
}
?>

