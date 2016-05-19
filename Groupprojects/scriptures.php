<?php

/**************************************
 * 
 *  File: index.php
 *  Created by: jsimpson
 *  Date: May 16, 2016 8:52:37 PM
 *  Description:
 * 
 ****************************************/

//Open DB
try 
{   
    $db = OpenDB("scriptures");
    
} catch (Exception $ex) 
{
    echo "Connection failed: " . $ex->getMessage();
    die();
}

echo "SCRIPTURE RESOURCES<br>";

//Get sected radio button
$dbcolumn =  $_POST['book'];

//Check if Radio button was selected or "All" was chosen
if($dbcolumn == "All" || $dbcolumn == NULL)
    $statement = $db->query("SELECT id, book, chapter, verse, context FROM scriptures");
else
    $statement = $db->query("SELECT id, book, chapter, verse, context FROM scriptures where book = " . $db->quote($dbcolumn) );  //use ->quote() to wrap "quotes" around variable

//Got get the data from the database
$results = $statement->fetchAll(PDO::FETCH_ASSOC);

//Display the results
foreach ($results as $row)
{
    echo "<b>" . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "</b> - ". $row["context"]."<br>";
}

$db = null;  //Close out the DB


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
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

return $db;

}

?>