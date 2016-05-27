<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**************************************
 * 
 *  File: display.php
 *  Created by: jsimpson
 *  Date: May 26, 2016 11:00:57 PM
 *  Description:
 * 
 ****************************************/

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
                $statement = $db->query("SELECT id, name,description,image_id FROM cars ORDER BY cars.name ASC");
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                foreach ($results as $row)
                {
                    echo "<option value=" .$row["id"] . ">" . $row["name"]. " - " .$row["description"] ."</option>\n";
                }

                $db = null;  //Close out the DB

            ?>
          </select>
    </form>
<?php } ?>