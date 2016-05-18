<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**************************************
 * 
 *  File: Survey_index.php
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

// ***** useing MySQLi Format
// 
//// Check connection and report error or success
//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//} 
//else
//    echo "SCRIPTURE RESOURCES<br>";

//
//$sql = "SELECT id, book, chapter, verse, context FROM scriptures";
//$result = $db->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "<b>" . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "</b> - ". $row["context"]."<br>";
//    }
//} else {
//    echo "0 results";
//}
//$db->close();

// ***** Using PDO format

$dbcolumn =  $_POST['book'];


if($dbcolumn == "All" || $dbcolumn == NULL)
    $statement = $db->query("SELECT id, book, chapter, verse, context FROM scriptures");
else
    $statement = $db->query("SELECT id, book, chapter, verse, context FROM scriptures where book = " . $db->quote($_POST['book']) );

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row)
{
    echo "<b>" . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "</b> - ". $row["context"]."<br>";
}

$db = null;


function openDB($dbname)
{

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
        // Not in the openshift environment
        //echo "Using local credentials: "; 
        //require("setLocalDatabaseCredentials.php");
        $servername = "localhost";
        $username = "php";
        $password = "php-login";
      
    }
    else 
    { 
        // In the openshift environment
        //echo "Using openshift credentials: ";
        $servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');        
          
    } 

// Create connection
//$db = new mysqli($servername, $username, $password, $dbname);
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

return $db;

}

?>