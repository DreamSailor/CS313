<?php

/**************************************
 * 
 *  File: questions.php
 *  Created by: jsimpson
 *  Date: May 7, 2016 7:32:05 AM
 *  Description: Created to do the work of getting, displaying and saving
 *  the survey results
 * 
 ****************************************/


//Filename for Data storage
$filename = "../data/testfile.txt";


//Check if we got here from POST Form
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $formPost = TRUE;  //set local variable so we know we posted the form

    // Set session variables
    $_SESSION["takenSurvey"] = "True";

}


//Get Data from File - Open to Read
$myfile = fopen($filename, "r");  
  
if (isset($myfile)) 
    $dataBuffer = fread($myfile, filesize($filename));   ///read info from file
else   
    die("Unable to read file!"); //End because there is nothing to read

//Close file to reading
fclose($myfile);

  

//If we got something from the file
if(isset($dataBuffer))
    $dataBuffer=trim($dataBuffer);  //clean any white space
else
    die("Unable to read file!"); //End because there is nothing to read

//If form was submitted get Answers and write to file
if ($formPost)
{
    //Get information from form questions and put it in an Array
    $formQuestions = fillRadioArray(); ;
    $formCheckBoxQuestions = FillCheckArray("question3");  //Question 3
     
    //Write Radio Button Questions to buffer
    questionAddResults($dataBuffer,$formQuestions[0]);  //Question 1
    questionAddResults($dataBuffer,$formQuestions[1]);  //Question 2
    questionAddResults($dataBuffer,$formQuestions[3]);  //Question 4
    
    //Write checkbox questions to buffer
    foreach($formCheckBoxQuestions as $thisItem)
        if(isset ($thisItem))
            questionAddResults($dataBuffer,$thisItem);
 
    
    //Open the file to write
    $myfile = fopen($filename, "w");
    
    if(empty($myfile))
        die("Unable to open file!");
    
    //Write the file back out
    fwrite($myfile, $dataBuffer);
    
    //Close file
    fclose($myfile);
    
}        

    
//Display Survey Results
DisplayAnswers($dataBuffer);




//Get Asnwers from the Form and put them into variables
function fillRadioArray()
{
    $radioQuestions = array(NULL,NULL,NULL);  //Empty array for each question
   
    
    $radioQuestions[0] = $_POST["question1"];
    $radioQuestions[1] = $_POST["question2"];
    $radioQuestions[3] = $_POST["question4"];
 

  
    return $radioQuestions;
}
   
//Function to parse through answers in an array and put into variables
function FillCheckArray($myArray)
{
    //new Array
    $checkQuestions = array();

    //see if the question was answered   
    if( isset( $_POST[$myArray] ))
    {
        //check each ite;
        foreach($_POST[$myArray] as $thisItem)
            if(isset ($thisItem))
            {
               //If and items is checked, added it to our array
                array_push($checkQuestions, $thisItem);
            }
    }

  
    return $checkQuestions;
}
  
    
//Increment the survey item counter for items that have a new answer
//This function uses string methods to get the right string from the file
//and then increment the counter, and put it back into the string to be written
//back to the file again.
function questionAddResults(&$fileBuffer,$formQuestionAnswer)
{

    if($formQuestionAnswer != "")  //Don't do anything on empty answers
    {
        //Check to see if there is a valid value to start
        $startPos = strpos($fileBuffer,$formQuestionAnswer);
        $endPos = strpos($fileBuffer,";",$startPos);
        $length = $endPos - $startPos;
        $questionInfo = substr($fileBuffer, $startPos, $length);
        $questionParts = explode(":", $questionInfo);
        $questionParts[1]++; 
        $questionNew = $questionParts[0] .":" .$questionParts[1];  
        $fileBuffer = str_replace($questionInfo, $questionNew, $fileBuffer);

    }
    
}

//String manipulate to take data from file and display it professionally.
 function DisplayAnswers($dataBuffer)
 {
     
    $order   = array("#", ";","~","@",":");
    $replace = array('<p/><p>','<br>','</h4>',"<h4>"," = ");
     
     $newstr = str_replace($order, $replace, $dataBuffer);
     
     echo $newstr;

 }


?>
