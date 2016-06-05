<?php
 // Start the session
    session_start();
    require "password.php";
    include "database.php";

/**************************************
 * 
 *  File: validate.php
 *  Created by: jsimpson
 *  Date: May 31, 2016 9:28:47 PM
 *  Description:
 * 
 ****************************************/

    $_SESSION['signin-err'] = NULL;  //empty out old errors
    $name = $_POST['name'];
    $password = $_POST['password'];
                 
    if(login($name,$password))
    {
        $_SESSION["loggedin"] = "True";
        $_SESSION['name'] = $name;
    }
    else 
    {
        $_SESSION['signin-err'] = "Invalid username or password.<br> Please try again<br>";
    }

    header("Location:pixar.php");

        
    
function login($name,$password)
{
    $success = false;
    
    $db= openDB("pixar_cars");
    
    $dbInfo = dbRead($db,"Select password from users where name=". $db->quote($name));
            
    $dbhash = $dbInfo[0]["password"];
   
    if(password_verify($password ,$dbhash ))
        $success = TRUE;
            
     $db = null;        
     
    return $success;
      
}
?>
