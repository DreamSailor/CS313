<?php
    // Start the session
    session_start();
    if (isset($_SESSION["takenSurvey"]))
    {
        header("Location: results.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <!--  
 
     *  File: survey.html
     *  Created by: jsimpson
     *  Date: May 7, 2016 7:32:05 AM
     *  Description:
     * 

      -->  

      <title>CS313 Survey Assignment</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>



    </head>
    <body>

        
      <div class="container-fluid">
        <h3>CS 313 Survey Assignment</h3>
        
        <hr/>
        <h5>Please fill out the following survey.</h5> 
        <div class="col-sm-6">
            <form class="search" id="survey" action="results.php" method="post"  >
            <p/>
            What is your Favorite Color:<br/>
            <input type="radio" name="question1" value="Red">Red<br/>
            <input type="radio" name="question1" value="Blue">Blue<br/>
            <input type="radio" name="question1" value="Green">Green<br/>
            <input type="radio" name="question1" value="Yellow">Yellow<br/>
            <input type="radio" name="question1" value="Orange">Orange<br/>
            <input type="radio" name="question1" value="White">White<br/>
            <input type="radio" name="question1" value="Black">Black<br/>
            <p/>
            <p/>
            What is your Favorite Season:<br/>
            <input type="radio" name="question2" value="Spring">Spring<br/>
            <input type="radio" name="question2" value="Summer">Summer<br/>
            <input type="radio" name="question2" value="Autumn">Autumn<br/>
            <input type="radio" name="question2" value="Winter">Winter<br/>
            <p/>
            <p/>
            Which of the Seven wonders of the "new" world you have visited:<br>
            <input type="checkbox" name="question3[]" value="Great Wall of China">Great Wall of China<br/>
            <input type="checkbox" name="question3[]" value="Taj Mahal">Taj Mahal<br/>
            <input type="checkbox" name="question3[]" value="Chichen Itza">Chichen Itza<br/>
            <input type="checkbox" name="question3[]" value="Machu Picchu">Machu Picchu<br/>
            <input type="checkbox" name="question3[]" value="Christ the Redeemer">Christ the Redeemer<br/>
            <input type="checkbox" name="question3[]" value="Petra">Petra<br/>
            <input type="checkbox" name="question3[]" value="The Colosseum">The Colosseum<p/>

            Did you enjoy this survey:<br>
            <input type="radio" name="question4" value="Yes">Yes<br/>
            <input type="radio" name="question4" value="No">No<br/>

             <input type="submit" name="submit" value="Submit">
    
        </form>
            <h5>To see the results without taking the survey: <a href="results.php"><button>View Results</button></a></h5>
        </div>
            
 
      </div>
      <footer class="container-fluid">

            <div class="col-sm-5 small">Last Updated: May 8th 2016</div>
            <div><a class="col-sm-1 label label-primary text-center" href="../index.html">Home</a></div>
            <div class="col-sm-6"></div>
  
    </footer>  
    </body>
</html>
