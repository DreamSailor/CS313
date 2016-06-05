/* 
 *  File:  main.js
 *  Created on : May 21st, 2016, 5:25:54 PM
 *  Author     : jeffry simpson
 *  Description: Javascript Helper functions
 *  
 */


function enableBtns() {
    
    if(document.getElementById("edit").classList.contains("disabled"))
        document.getElementById("edit").classList.remove("disabled");
    if(document.getElementById("delete").classList.contains("disabled"))
        document.getElementById("delete").classList.remove("disabled");
}

function disableBtns() {
    if(!document.getElementById("edit").classList.contains("disabled"))
        document.getElementById("edit").classList.add("disabled");
    if(!document.getElementById("delete").classList.contains("disabled"))
        document.getElementById("delete").classList.add("disabled");
}

function XMLRequestor(htmlElement,phpFile,paramString)
{
    if (window.XMLHttpRequest) 
    {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } 
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            document.getElementById(htmlElement).innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",phpFile,true);
    
    //Send the proper header information along with the request
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", paramString.length);
    xmlhttp.setRequestHeader("Connection", "close");
    xmlhttp.send(paramString);
    
}

function showCar(str) 
{
    if (str == "") 
    {
        document.getElementById("displayArea").innerHTML = "";
        disableBtns();

    } 
    else 
    { 
        XMLRequestor("displayArea","getcarinfo.php","cars="+str);
        enableBtns();
    }
}

function deleteCar() 
{
    //Only do something if we aren't disabled
    if(!document.getElementById('delete').classList.contains("disabled"))  
    {
        disableBtns();
        if(window.confirm("Do you want to delete this car?"))
        {
            document.getElementById("displayArea").innerHTML = "";
            XMLRequestor("carDropdown","altercar.php","op=delete");
            disableBtns();
        }
        else
        {
         enableBtns();
        }
        
    }
    
}


function cancelEdit()
{
    
   XMLRequestor("carDropdown","altercar.php","op=cancel");
   disableBtns();
    document.getElementById("displayArea").innerHTML = "<center>Operation Canceled! - Please pick a Car from the list, or press 'Add'</center>"; 
}
 

function alterCar(myFunc) 
{
    //Only do something if we aren't disabled
    if(!document.getElementById(myFunc).classList.contains("disabled"))  
    {
        disableBtns();
        document.getElementById("displayArea").innerHTML = "";
        
        XMLRequestor("displayArea","altercar.php","op="+myFunc);


    }
    
}

 function comingSoon(btn)
 {
      if(!document.getElementById(btn).classList.contains("disabled"))
        window.alert("This feature coming soon");
    
 }
 
  function testme(string)
 {
      
        window.alert("This is a test of " + string);
    
 }
 
// 
//function addEditCar()
//{
//    document.getElementById('addcar').submit();
//    console.log("Here I am");
//    XMLRequestor("carDropdown","altercar.php","op=ok");
//    disableBtns();
//    document.getElementById("displayArea").innerHTML = "<center>Your XCar was successfully added, Choose it from the dropdown list above</center>"; 
//    
//}


