<?php
    // Start the session
    session_start();
    include "dbaccess.php";
?>
<!DOCTYPE html>
<!--
/**************************************
 * 
 *  File: dbaccess.php
 *  Created by: jsimpson
 *  Date: May 18, 2016 7:01:44 PM
 *  Description:
 * 
 ****************************************/
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

  
        <title>My Pixar Car Collection</title>
    
        
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-9">
                <h1 class="text-center">Pixar Car Collection</h1>
                </div>
                <div class="col-sm-3"></div>
            </div>
        
            <?php

                //Open the DB
                 $db = OpenDB("pixar_cars");

            ?>
        
        <div class="row graybar">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-9">
                <form>
                    <select  name="cars" onchange="showCar(this.value)">
                        <option value="">Select a car:</option>

                        <?php
                            //Get the list of cars from DB
                            $statement = $db->query("SELECT id, name,description,image_id FROM cars ORDER BY cars.name ASC");
                            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($results as $row)
                            {
                                echo "<option value=" .$row["id"] . ">" . $row["name"]. " - " .$row["description"] ."</option>\n";
                            }

                            
                            $db = null;  //Close out the DB

                        ?>
                      </select>
                </form>
  
            </div>
            <div class="col-sm-3"></div>
        </div>        
        <div class="row box content">
            <div class="col-sm-1 bluebar">
                <div>
                <button type="button" class="btn btn-info btn-block" onclick="comingSoon()">Add</button>
                <button type="button" class="btn btn-info btn-block">Edit</button>
                </div>
            </div>
            <div class="col-sm-9 graybar " id="writeMe"></div>
            <div class="col-sm-2 bluebar"></div>
        </div> 
            
        <div class="row ">
            <div class="col-sm-1"></div>
            <div class="col-sm-9 "></div>
            
            <div class="col-sm-2"></div>
        </div> 
        
      <footer class="row">

            <div class="col-sm-5 small">Last Updated: May 21th 2016</div>
            <div><a class="col-sm-1 label label-primary text-center" href="../index.html">Home</a></div>
            <div class="col-sm-6"></div>
  
    </footer>  
       </div>
    </body>
</html>
