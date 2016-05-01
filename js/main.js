/* 
 *  Created on : April 30th, 2016, 5:25:54 PM
 *  Author     : jeffry simpson
 *  
 */
 

function mouseOver(sAssign,sStatus) 
{
    getStatus(sStatus);
    document.getElementById(sAssign).style.display = 'inline';
}

function mouseOut(sAssign) 
{

    document.getElementById(sAssign).style.display = 'none';
    clearStatus();
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
