<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>03.5 - Team Readiness Activity</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>03.5 - Team Readiness Activity</h2>
        <!--<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  -->
        <form id="survey" action="survey.php" method="post"  >
            Name: <input type="text" name="name"><br/>           
            Email: <input type="text" name="email"> <p/>
            Major:<br/>
            <input type="radio" name="major" value="Computer Science">Computer Science<br/>
            <input type="radio" name="major" value="Web Development and Design">Web Development and Design<br/>
            <input type="radio" name="major" value="Computer Science">Computer Information Technology<br/>
            <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br/>
            <p/>
            Places you have visited:<br>
            <input type="checkbox" name="continents[]" value="North America">North America<br/>
            <input type="checkbox" name="continents[]" value="South America">South America<br/>
            <input type="checkbox" name="continents[]" value="Europe">Europe<br/>
            <input type="checkbox" name="continents[]" value="Asia">Asia<br/>
            <input type="checkbox" name="continents[]" value="Australia">Australia<br/>
            <input type="checkbox" name="continents[]" value="Africa">Africa<br/>
            <input type="checkbox" name="continents[]" value="Antartica">Antartica<p/>

            Comments:<br>
            <textarea name="comments" rows="5" cols="40"></textarea>
            <p/>
             <input type="submit" name="submit" value="Submit"> 
             
        </form>
    </body>
</html>
