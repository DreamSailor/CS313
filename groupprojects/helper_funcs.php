<?php

/**************************************
 * 
 *  File: db_funcs.php
 *  Created by: jsimpson
 *  Date: May 25, 2016 6:58:42 AM
 *  Description:
 * 
 ****************************************/

function checkError($str)
{
    $errstr = null;
    
    if(isset($_SESSION[$str]))
        $errstr = $_SESSION[$str];
           
    return $errstr;
}

function checkValidLen($str,$len)
{
    $flag = false;
    if(strlen ($str) >= $len )
        $flag= true;
       
   return $flag;
}

                
function getTopics()
{
    $db = OpenDB("scriptures");

    $statement = $db->query("SELECT * FROM topics");
    $topics = $statement->fetchAll(PDO::FETCH_ASSOC);

    $db = null;

    return $topics;
}


function addTopics($getId)
{
      $topics = FillCheckArray("topics");
      
      $count = count($topics);
      $i=0;
      
      if($count >= 1)
      {

          $statement = "INSERT INTO verse_topic (vs_id,topic_id) VALUES ";
          
          foreach($topics as $item)
          {
              $i++;
              $statement .= "($getId,$item)";
              
              if($i != $count)
                  $statement .= ',';
             
          }
          
          $statement .= ";";
      }
      
   
    $db = OpenDB("scriptures");
     //insert into scriptures VALUES (NULL,NULL,"John","3","5","For god so loved the world");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    
     try
    {
    
       $db->exec($statement);
    }
    catch(PDOException $e)
    {
        echo $statement . "<br>" . $e->getMessage();
    }
    
    
    $db = null;
     
}



function addVerse()
{
    

    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $context =  $_POST['content'];
  

    $db = OpenDB("scriptures");
    

    $statement = "INSERT INTO scriptures (book,chapter,verse,context) VALUES ('$book', '$chapter', '$verse', '$context')";

        
   //insert into scriptures VALUES (NULL,NULL,"John","3","5","For god so loved the world");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    
    try{
    
       $db->exec($statement);
    }
    catch(PDOException $e)
    {
        echo $statement . "<br>" . $e->getMessage();
    }
    
    $last_id = $db->lastInsertId();
    
    $db = null;
    
    return $last_id;
}

function dbRead($db,$sqlQuery)
{

    //Build PDO statement and fetch it from DB
    $statement = $db->query($sqlQuery);         
    $dbInfo =  $statement->fetchAll(PDO::FETCH_ASSOC);
  
    return $dbInfo;
}

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

//Function to parse through Checkboxes in an array and put into variables
function FillCheckArray($myArray)
{
    //new Array
    $checkedBoxes = array();

    //see if the question was answered   
    if( isset( $_POST[$myArray] ))
    {
        //check each ite;
        foreach($_POST[$myArray] as $thisItem)
            if(isset ($thisItem))
            {
               //If and items is checked, added it to our array
                array_push($checkedBoxes, $thisItem);
            }
    }

  
    return $checkedBoxes;
}