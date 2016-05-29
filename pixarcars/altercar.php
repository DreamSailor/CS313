<?php
    // Start the session
    session_start();
    include "database.php";
    include "files.php";
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
        deleteDbRecord();
        renderCarList();
        break;
     
     case "edit":
        $carIndex = $_SESSION["currRecord"];
        buildEditForm($fillData);
        break;
    
     case "add":
        buildEditForm("");
        break;

     case "ok":
         addDbRecord();
         echo "Your Record was added<br>";
         echo "<button type='button' id='home' class='btn btn-sm btn-info btn-block' onclick=\"javascript:location.href='pixar.php'\">Return</button> ";    
         break;
    
     case "cancel":
         renderCarList();
         break;
 }

    
?>
