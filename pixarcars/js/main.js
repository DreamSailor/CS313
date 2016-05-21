/* 
 *  Created on : May 21st, 2016, 5:25:54 PM
 *  Author     : jeffry simpson
 *  
 */


function showCar(str) 
{
    if (str == "") 
    {
        document.getElementById("writeMe").innerHTML = "";
        return;
    } 
    else 
    { 
        if (window.XMLHttpRequest) 
        {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } 
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("writeMe").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getcarinfo.php?cars="+str,true);
        xmlhttp.send();
    }
}
 
 function comingSoon()
 {
     window.confirm("This feature coming soon");
 }
 

function mouseOver(sAssign,sStatus) 
{
    getStatus(sStatus);
    document.getElementById(sAssign).style.display = 'inline';
    document.getElementById('a-none').style.display = 'none';
}

function mouseOut(sAssign) 
{
    clearStatus();
    document.getElementById(sAssign).style.display = 'none';
    //document.getElementById('a-none').style.display = 'inline';
    
}

function clearStatus(sStatus)
{
    document.getElementById('status').style.display = 'none';
    document.getElementById('done').style.display = 'none';
    document.getElementById('not-done').style.display = 'none';
}

function getStatus(sStatus)
{
    document.getElementById('status').style.display = 'inline';

    if(sStatus === 'done')
    {
        document.getElementById(sStatus).style.display = 'inline';
    }

    else if (sStatus === 'not-done')
    {
        document.getElementById(sStatus).style.display = 'inline';
    }
    
}
