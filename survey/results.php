<?php
/**************************************
 * 
 *  File: results.php
 *  Created by: jsimpson
 *  Date: May 7, 2016 7:32:05 AM
 *  Description: Formate template for survey results
 * 
 ****************************************/

    //Start the session
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>

      <title>CS313 Survey Results</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>
    <body>
            
        <div class=" container-fluid"> 

            <h3>Survey Results</h3>
            <hr>
            <div class="col-sm-6 search">
        
                <?php
                //Include functions to create results
                require 'questions.php';
                ?> 
                
            </div>
            <div class="col-sm-6"></div>

        </div>
        <footer class="container-fluid">

            <div class="col-sm-5 small">Last Updated: May 8th 2016</div>
            <div><a class="col-sm-1 label label-primary text-center" href="../index.html">Home</a></div>
             <div class="col-sm-6"></div>

        </footer>
    </body>
</html>
