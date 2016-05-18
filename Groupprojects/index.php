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



     $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

     if ($openShiftVar === null || $openShiftVar == "")
     {
          // Not in the openshift environment
          //echo "Using local credentials: "; 
          //require("setLocalDatabaseCredentials.php");
        $servername = "localhost";
        $username = "php";
        $password = "php-login";
        $dbname = "scriptures";
     }
     else 
     { 
          // In the openshift environment
          //echo "Using openshift credentials: ";

          $servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
          $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
          $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
          $dbname = "scriptures";
          
          
     } 


// Create connection
$db = new mysqli($servername, $username, $password, $dbname);


// Check connection and report error or success
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
    echo "SCRIPTURE RESOURCES<br>";


$sql = "SELECT id, book, chapter, verse, context FROM scriptures";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<b>" . $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "</b> - ". $row["context"]."<br>";
    }
} else {
    echo "0 results";
}
$db->close();

?>