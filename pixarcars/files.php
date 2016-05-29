<?php

/**************************************
 * 
 *  File: files.php
 *  Created by: jsimpson
 *  Date: May 28, 2016 8:02:26 AM
 *  Description: Physical File Manipulation functions
 * 
 ****************************************/

//Come back and do this separeate
//get session in one funct
// do db read
//get string and delete the file


function deleteImageFile()
{ 
 
    $carIndex = $_SESSION["currRecord"];  
      
    if(isset($carIndex))
    {
       $imageInfo = dbRead($db,"SELECT folderpath, name FROM image WHERE car_id=$carIndex"); 
       $imageFile = $imageInfo[0]["folderpath"] ."/" .$imageInfo[0]["name"];

       //delete image file
       if(file_exists ($imageFile ))
            unlink($imageFile); 
    }
    
}

function sessionWrite($info)
{
    if(isset($info[0]))
        $_SESSION["carArray"] = $info[0];
    else
        $_SESSION["carArray"] = NULL;
    
    //var_dump($_SESSION['carArray']);
}

function setOpSession($str)
{
    $_SESSION["op"] = $str;
}

function sVar($str)
{
    if($_GET['op'] == 'edit')
        $var = $_SESSION['carArray'][$str];
    else
        $var="";
    
    return $var;
}
   