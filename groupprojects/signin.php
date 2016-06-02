<?php
 // Start the session
    session_start();
    include 'helper_funcs.php';

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
        <title>Sign-in</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body>
              
        <form class="search" id="login" action="validate.php" method="post"  >
            <div>Please enter your username and password:</div>
            <input type="hidden" name="page" value="signin"> 
            Username:
            <input type="text" name="name"><br/>
            Password: <input type="password" name="password"><br/> 
                   
          <input type="submit" name="submit" value="Submit"> 
        </form>
        <p>
        <div>Need a Username?  Click <a href="signup.php">here<a/> to create one </div>
        <p/>
        <div style="color: red;"><?php echo checkError('signin-err'); ?></div>

    </body>
</html>
    