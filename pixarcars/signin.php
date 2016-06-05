<?php
    // Start the session
    session_start();
    require "password.php";
    include "database.php";
    include "display.php";
    

/**************************************
 * 
 *  File: signin.php
 *  Created by: jsimpson
 *  Date: May 31, 2016 9:16:03 PM
 *  Description:
 * 
 ****************************************/
     
  ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Pixar Car Collection</title>  
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
     
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

            <div class="row bottombrd grayband">
                <div class="col-sm-2">
                </div>
                <div id="carDropdown" class="col-sm-4"></div>
                <div class="col-sm-4"></div>
            </div>  
            
            
            
            <div class="row box content">
                <div class="col-sm-1 bluebar">
                </div>
                <div class="col-sm-9 lsidebrd rsidebrd graybar " id="displayArea">
                      <form class="text-center" id="login" action="validate.php" method="post"  >
                        <h4>Please enter your username and password:</h4>
                        <input type="hidden" name="page" value="signin"> 
                        Username:
                        <input type="text" name="name"><br/>
                        Password: <input type="password" name="password"><br/> 

                      <input type="submit" name="submit" value="Submit">   
                     </form>
                    <div style="color: red;"><?php echo checkError('signin-err'); ?></div>
                </div>
                <div class="col-sm-2 bluebar"></div>
            </div>  

            <div class="row ">
                <div class="col-sm-1"></div>
                <div class="col-sm-9 "></div>

                <div class="col-sm-2"></div>
            </div> 


            <footer class="row">

                 <div class="col-sm-12 small">Last Updated: May 21th 2016</div>

            </footer>  
        </div>
    </body>
</html>

