<?php
    // Start the session
    session_start();
    include "database.php";
    include "helper.php";
    include "display.php";
 

 
/**************************************
 * 
 *  File: Altercar.php
 *  Created by: jsimpson
 *  Date: May 26, 2016 9:40:45 PM
 *  Description: Calls DB and Display for Adding, Editing, Deleting cars
 * 
 ****************************************/
    
 $operation =  $_POST['op'];  
 
 switch($operation)
 {
     case "delete":
        deleteDbRecord();
        renderCarList();
        break;
     
     case "edit":
        buildEditForm("update");
        break;
    
     case "add":
        buildEditForm("ok");
        break;

     case "ok":
         addDbRecord();
         renderCarList();  
         break;
     
     case "update":
         updateDbRecord();
         renderCarList();
         //echo "Your Record was Edited<br>";
         //echo "<button type='button' id='home' class='btn btn-sm btn-info btn-block' onclick=\"javascript:location.href='pixar.php'\">Return</button> ";    
         break;
    
     case "cancel":
         renderCarList();
         //echo"<center>Operation Canceled - Please pick a new Car from the list, or press 'Add'</center>";
         break;
 }

