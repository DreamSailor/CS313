<?php
    // Start the session
    session_start();
    include "database.php";
    include "display.php";

 
/**************************************
 * 
 *  File: Altercar.php
 *  Created by: jsimpson
 *  Date: May 26, 2016 9:40:45 PM
 *  Description: Calls DB and Display for Adding, Editing, Deleting cars
 * 
 ****************************************/
    
 $operation =  $_GET['op'];  
 
 switch($operation)
 {
     case "delete":
        deleteDbrecord();
        renderCarList();
         break;
     
     case "edit":
        $carIndex = $_SESSION["currRecord"];
        echo "Edit Car<br>";
        echo $carIndex;
        echo "<br>Done</br>";
        break;
    
     case "add":
        echo "<h2>Add New Car</h2>";
        echo "<form><input type='text' id='name'>";
        echo "<input type='text' id='description' <br/>";
        echo "<input type='submit' name='submit' value='Submit'> </form>";
        break;
 }

    
?>
