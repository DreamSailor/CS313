<?php
 // Start the session
    session_start();
    include "helper_funcs.php";

/**************************************
 * 
 *  File: validate.php
 *  Created by: jsimpson
 *  Date: May 31, 2016 9:28:47 PM
 *  Description:
 * 
 ****************************************/

    $_SESSION['signin-err'] = NULL;  //empty out old errors
    $_SESSION['signup-err'] = NULL;  //empty out old errors
    $name = $_POST['name'];
    $password = $_POST['password'];

    
    
    if($_POST['page'] === 'signin')  //sign-in
    {
                 
        if(login($name,$password))
        {
            $_SESSION["loggedin"] = "True";
            $_SESSION['name'] = $name;
            header("Location:index.php");
        }
        else 
        {
            $_SESSION['signin-err'] = "Invalid username or password.<br> Please try again<br>";
             header( "Location:signin.php" );
           
            
        }

        
    }
    else  //sign-up
    {
       if(createLogin($name,$password))
       {
           $_SESSION['signin-err'] = "Successfully created username/password.<br> Please log in<br>";
           header("Location:signin.php");
       }
       else
       {
             header("Location:signup.php");
       }
      
 
    }
    
function login($name,$password)
{
    $success = false;
    
    
    $db= openDB("users");
//    
//    $statement = $db->query();         
//    $dbInfo =  $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $dbInfo = dbRead($db,"Select password from users where username=". $db->quote($name));
            
    $dbhash = $dbInfo[0]["password"];
    
   
    if(password_verify($password ,$dbhash ))
            $success = TRUE;
            
     $db = null;        
            
    return $success;
    
    
}


function createLogin($name, $password)
{
    $flag = FALSE;
    
    if((checkValidLen($name,8) && checkValidLen($password,8)))   //force at least 8 character length
    {
  
        $db= openDB("users");
        
        $dbInfo = dbRead($db,"Select username from users where username=". $db->quote($name));
        
        if(isset($dbInfo[0]))  //username already exists
        {
             $_SESSION['signup-err'] = "You can not use this name.<br>Please try again<br>";
             return $flag;
        }
            

        $hash = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (:nam, :pass)");
        $stmt->bindParam(':nam', $name);
        $stmt->bindParam(':pass', $hash);

        if($stmt->execute())
        {
            $flag = TRUE;
        }
        else
        {
            $_SESSION['signup-err'] = "ERROR creating your username or password.<br> Please try again<br>";
        }

         $db = null;
    }
    else
    {
        $_SESSION['signup-err'] = "Your Username/password needs to be at least 8 characters long.<br>Please try again<br>";

    }
            
    return $flag;
}


        