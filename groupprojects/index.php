<?php include "db_funcs.php"; ?>
<!DOCTYPE html>
<!--
/**************************************
 * 
 *  File: index.php
 *  Created by: jsimpson
 *  Date: May 16, 2016 8:52:37 PM
 *  Description:
 * 
 ****************************************/
-->
<html>
    <head>
        <title>GroupProject 6.5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
              
      
        <form class="search" id="scriptures" action="add_verse.php" method="post"  >
            <div>Please Add your Scripture:</div>
            Book:
            <input type="text" name="book"><br/>
            Chapter: <input type="text" name="chapter"> 
            Verse: <input type="text" name="verse"><br/>
            Scriptures Topics:<br>
            <?php 
            
                
                $topics = getTopics();
            
                foreach($topics as $item)
                {
                    echo "<input type='checkbox' name='topics[]' value=";
                    echo $item['id'] . ">" .$item['name'] ."<br/>";
                }
        
            ?>          
            Scripture Content:<br> <textarea rows='4' cols='100' name="content"></textarea><br>
           <br>
            
          <input type="submit" name="submit" value="Submit"> 
        </form>
    </body>
</html>
    