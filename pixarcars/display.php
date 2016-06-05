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
function buildEditForm($op)
{    
    setOpSession($op);

    echo "<h5>";
    if($_POST['op'] == 'add')
        echo "Add Car</h5>";
    else
        echo "Edit Car</h5>";
    ?>
   <!-- <form id="addcar" >  -->
        <div id="form" class="well">
        <form method="post" id="addcar"> 
        <input  type="hidden" name="op" value=<?php echo "$op"; ?> /> 
 
        <label class="col-sm-2" for="name">Name:</label>
        <input class="col-sm-5" type="text" name="name" value="<?php echo sVar('name'); ?>">
        <span class="col-sm-5" ><br>&nbsp;</span>

        <label class="col-sm-2" for="descript">Description:</label> 
        <input class="col-sm-9" type="text" name="description" size="120" value="<?php echo sVar('description'); ?>" >
        <span class="col-sm-1" ><br>&nbsp;</span>

        <span class="col-sm-offset-2 col-sm-3">Select Primary Car:<br></span>
        <span class="col-sm-4">
        <?php    
            $primeId = 0;
            if($_POST['op'] == 'edit')
            {
                    $primeId =$_SESSION['carArray']['primary_car_id'];
                    if(empty($primeId))
                        $primeId = 0;
            }

            renderPrimaryList($primeId);
                
          
            ?></span>
            <span class="control-label col-sm-5" ><br>&nbsp;</span>
        
        Is this a Race Car? 
        <?php
            if(($_POST['op'] == 'edit') && (sVar("race_car")== 1))
            {
                echo "<input type='radio' name='race_car' checked value='yes'>Yes";
                echo "<input type='radio' name='race_car'  value='no'>No";
            }
            else  //edit and Not Race Car
            {
                echo "<input type='radio' name='race_car' value='yes'>Yes";
                echo "<input type='radio' name='race_car' checked value='no'>No"; 
                
            }
        ?>
        Race Number: <input type ="text" name="race_num" size="5" value="<?php echo sVar('race_number'); ?>">
        Race Sponsor: <input type="text" name="race_sponsor" "<?php echo sVar('race_sponsor'); ?>"><br/>
        <p>
        Purchase date: (YYYY-MM-DD) <input type="date" name="purchase" value="<?php echo sVar('date_aquired'); ?>" size="10"><br/>
        </p>
        Friends:<br>
        <?php 
            $friends = getAllDbFriends();
            displayFriends($friends);
        ?>
        <p></p>
        Locations:<br>
        <?php 
            $locations = getAllDbLocations();
            displayLocations($locations);
        ?>
        <p/>
        
        
       <button type="submit" id="ok" class="btn btn-sm btn-primary ">OK</button>
        <button type="button" id="cancel" class="btn btn-sm btn-info " onclick="cancelEdit()">Cancel</button>

      </form>  
     </div>
<?php } ?>


<?php
function renderCarList()
{  
    $_SESSION['carArray'] = NULL;
    ?>

   <form id='carselect'>
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
function renderPrimaryList($myId)
{      
    ?>

        <select  name="prime">
            <option value="0">Self</option>
            <?php
            
 
                //Open the DB
                $db = OpenDB("pixar_cars");

                //Get the list of cars from DB
                $results = dbRead($db,"SELECT id, name FROM cars WHERE primary_version = 1 ORDER BY cars.name ASC");

                foreach ($results as $row)
                {
                    if($myId == $row["id"])
                    {
                        echo "<option selected='selected' value=" .$row["id"] . ">" . $row["name"] ."</option>\n";
                    }
                    else
                        echo "<option value=" .$row["id"] . ">" . $row["name"] ."</option>\n";
                }

                $db = null;  //Close out the DB

            ?>
          </select>
   
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

function checkError($str)
{
    $errstr = null;
    if(isset($_SESSION[$str]))
        $errstr = $_SESSION[$str];
           
    return $errstr;
}
  



?>
