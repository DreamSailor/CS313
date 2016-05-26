<?php

/**************************************
 * 
 *  File: add_verse.php
 *  Created by: jsimpson
 *  Date: May 24, 2016 7:27:22 AM
 *  Description:
 * 
 ****************************************/

include "db_funcs.php";


//Add teh scrpture vers
$newId = addVerse();

//Add to Topics Table
addTopics($newId);

//Get Topics
$topics = getTopics();

//Display Scriptures by Topic
displayScriptures($topics);





function displayScriptures($topics)
{
    $db = OpenDB("scriptures");
    
    echo "<h1>Scriptures by Topic</h1>";
    
    foreach($topics as $item)
    {
      $curTopic = $item['id'];  
      $statement = $db->query("select scriptures.id, scriptures.book,scriptures.chapter, 
       scriptures.verse, scriptures.context, topics.name as topics 
       from scriptures,topics,verse_topic 
       where scriptures.id = verse_topic.vs_id 
	and topics.id = verse_topic.topic_id and topics.id=$curTopic
	order by scriptures.id asc;");

       $displayInfo = $statement->fetchAll(PDO::FETCH_ASSOC);
       
       echo "<strong>Topic:" . $item['name']. "</strong><br/>";
       
       foreach($displayInfo as $row)
       {   
           echo $row['book'] ." " .$row['chapter'] .":"
                .$row['verse'] ." - " .$row['context'] . "<br/>";
       
       }
       
       echo "<br/>";  
        
    }
    
    $db = null;
       
}



