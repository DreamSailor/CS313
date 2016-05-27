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
    xmlhttp.open("GET",phpFile+"?"+paramString,true);
    xmlhttp.send();
    
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
 

function alterCar(myFunc) 
{
    //Only do something if we aren't disabled
    if(!document.getElementById(myFunc).classList.contains("disabled"))  
    {
        disableBtns();
        document.getElementById("displayArea").innerHTML = "";
        
        XMLRequestor("displayArea","altercar.php","op="+myFunc);

//        if (window.XMLHttpRequest) 
//        {
//            // code for IE7+, Firefox, Chrome, Opera, Safari
//            xmlhttp = new XMLHttpRequest();
//        } 
//        xmlhttp.onreadystatechange = function() {
//            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
//            {
//                document.getElementById("displayArea").innerHTML = xmlhttp.responseText;
//               
//            }
//        };
//        xmlhttp.open("GET","altercar.php?op="+myFunc,true);
//        xmlhttp.send();

    }
    
}

 function comingSoon(btn)
 {
      if(!document.getElementById(btn).classList.contains("disabled"))
        window.alert("This feature coming soon");
 }
 


