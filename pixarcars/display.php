<?php

/**************************************
 * 
 *  File: display.php
 *  Created by: jsimpson
 *  Date: May 26, 2016 11:00:57 PM
 *  Description:
 * 
 ****************************************/

?>

<?php
function buildEditForm($fillData)
{      
    ?>
    <h5>Add Car</h5>
    <form id="addcar" action="altercar.php" method="GET">
        <input type="hidden" name="op" value="ok" /> 
        Name:
        <input type="text" name="name">
        Is this the Primary Car? 
        <input type="radio" name="primary_car" checked="checked" value="yes">Yes
        <input type="radio" name="primary_car" value="no">No<br/>
        Description: 
        <input type="text" name="description" size="120"><br>
        Purchase date: (YYYY-MM-DD) <input type="date" name="purchase" min="2005-05-20" size="10"><br/>
        Is this a Race Car? 
        <input type="radio" name="race_car" value="yes">Yes
        <input type="radio" name="race_car" checked="checked" value="no">No
        Race Number: <input type ="text" name="race_num" size="5">
        Race Sponsor: <input type="text" name="race_sponsor"><br/>
        <p></p>
        Friends:<br>
        <?php 
            $friends = getDbFriends();
            displayFriends($friends);
        ?>
        <p></p>
        Locations:<br>
        <?php 
            $locations = getDbLocations();
            displayLocations($locations);
        ?>
        <p/>
        
        
       <button type="submit" id="ok" class="btn btn-sm btn-primary ">OK</button>
        <button type="button" id="cancel" class="btn btn-sm btn-info " onclick="cancelEdit()">Cancel</button>

      </form>  

<?php } ?>


<?php
function renderCarList()
{      
    ?>

   <form>
        <select  name="cars" onchange="showCar(this.value)">
            <option value="">Select a car:</option>
            <?php
                //Open the DB
                $db = OpenDB("pixar_cars");

                //Get the list of cars from DB
                $results = dbRead($db,"SELECT id, name,description FROM cars ORDER BY cars.name ASC");

                foreach ($results as $row)
                {
                    echo "<option value=" .$row["id"] . ">" . $row["name"]. " - " .$row["description"] ."</option>\n";
                }

                $db = null;  //Close out the DB

            ?>
          </select>
    </form>
<?php } ?>

    
<?php 

function displaylocations($items)
{

   foreach($items as $row)
   {
       echo"<input type='checkbox' name='locations[]' value=" .$row["id"] .">". $row["name"] . " - " . $row["country"]."<br/>";

   }
}

function displayFriends($items)
{
    $count = 0;
   foreach($items as $row)
   {
       echo"<input type='checkbox' name='friends[]' value=" .$row["id"] .">". $row["name"] ."&nbsp;&nbsp";
       $count++;
       if($count == 8)
       {
           echo"<br/>";
           $count = 0;
       }
   }
   echo "<br/>";
}
?>
