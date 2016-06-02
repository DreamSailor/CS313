<?php
 // Start the session
    session_start();
    include 'helper_funcs.php';

/**************************************
 * 
 *  File: signup.php
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
        <script language="javascript" type="text/javascript">
            function cancel_click() 
            {
                window.location.href = "index.php";
            }
</script>
        
    </head>
    <body>
    <form class="search" id="login" action="validate.php" method="post"  >
            <div>Please Create your username and password:</div>
            <input type="hidden" name="page" value="signup"> 
            Username:
            <input type="text" name="name"><br/>
            Password: <input type="password" name="password"><br/> 
                   
          <input type="submit" name="submit" value="Submit"> 
          <input id="cancel" type="button" value="Cancel" 
       onclick="return cancel_click()" />
        </form>
        <p/>
        <div style="color: red;"><?php echo checkError('signup-err'); ?></div>
    </body>
</html>




    