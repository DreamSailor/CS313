<?php
    // Start the session
    session_start();
    include "database.php";
    include "display.php";
    
    /**************************************
 * 
 *  File: Pixar.php  Database Assignment
 *  Created by: jsimpson
 *  Date: May 18, 2016 7:01:44 PM
 *  Description:
 * 
 ****************************************/
    
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {	

               $(document).on('submit', '#addcar', function()
                {		
                    $.post('submit.php', $(this).serialize())
                    .done(function(data)
                    {
                        $("#addcar").fadeOut('slow', function()
                        {
                            $(".result").fadeIn('slow', function()
                            {
                                $(".result").html(data);	
                            });
                       });
                    })
                    .fail(function()
                    {
                            alert('fail to submit the data');
                    });
                    return false;
                });	

            });
            </script>

        
  
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
        
        <div class="row bottombrd graybar">
            <div class="col-sm-2">
            </div>
            <div id="carDropdown" class="col-sm-4">
             <?php  renderCarList();  ?> 
            </div>
            <div class="col-sm-4"></div>
        </div>        
        <div class="row box content">
            <div class="col-sm-1 bluebar">
                <div>
                <button type="button" id="home" class="btn btn-sm btn-info btn-block" onclick="javascript:location.href='../index.html'">Home</button>    
                <button type="button" id="add" class="btn btn-sm btn-info btn-block" onclick="alterCar('add')">Add</button>
                <button type="button" id="edit" class="btn btn-sm btn-info btn-block disabled" onclick="alterCar('edit')">Edit</button>
                <button type="button" id="delete" class="btn btn-sm btn-info btn-block disabled" onclick="deleteCar()">Delete</button>
                </div>
            </div>
            <div class="col-sm-9 lsidebrd rsidebrd graybar " id="displayArea">
                
                
 <!--               	<div id="form" class="result">
                            <form method="post" id="reg-form">
                            <table border="0">
                            <tr>
                            <td><input type="text" name="fname" id="lname" placeholder="First Name" /></td>
                            </tr>

                            <tr>
                            <td><input type="text" name="lname" id="lname" placeholder="Last Name" /></td>
                            </tr>

                            <tr>
                            <td><input type="text" name="email" id="email" placeholder="Your Mail" /></td>
                            </tr>

                            <tr>
                            <td><input type="text" name="phno" id="phno" placeholder="Contact No" /></td>
                            </tr>

                            <tr>
                            <td><hr /></td>
                            </tr>

                            <tr>
                            <td align="center"><button type="submit">Register</button></td>
                            </tr>
                            </table>
                            </form>
                        </div>
                
           -->     
                
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
