<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h2>03.5 - Team Readiness Activity Completed Form</h2>
        <div>Here is your completed form.</div>
        <p/>
    <?php
          
            echo "Name: ".$_POST["name"];
            echo "<br/>Email: " . $_POST["email"];
            echo "<p/>Major: " . $_POST["major"];
            echo "<p/>Places visited:<br>";
            if( isset( $_POST['continents'] ))
            {
                foreach($_POST['continents'] as $selected)
                    echo $selected."</br>";
            }
            echo "<p/>Comments: " . $_POST["comments"];
            echo "<p/>"
         
       
        ?>
    </body>
</html>
