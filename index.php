<?php

//needed files

    require_once('model/database.php');
    require('model/classes_db.php');
    require('model/makes_db.php');
    require('model/types_db.php');
    require('model/vehicles_db.php');
    
//sanitize POSTS

$make_id = filter_input(INPUT_POST, 'make_id');
$type_id = filter_input(INPUT_POST, 'type_id');
$class_id = filter_input(INPUT_POST, 'class_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');


// call 

$makes = get_makes($make_id);
$classes = get_classes($class_id);
$types = get_types($type_id);
$vehicles = get_vehicles($vehicle_id);

$vehicles_by_class = get_vehicle_by_class($class_id);

// header 

include('view/header.php'); ?>

        <?php //category drop downs and radio buttons ?>

        <form action="index.php" method="post"
              id="sort_vehicle_list">

            <label>Category:</label>
            <br>
            <select name="make_id">
                <option value=".">View All Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['make_ID']; ?>">
                    <?php echo $make['vehicleMake']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <select name="class_id">
                <option value=".">View All Classes</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_ID']; ?>">
                    <?php echo $class['vehicleClasses']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <select name="type_id">
                <option value=".">View All Types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['vehicleTypes']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <br>

            <input type="radio" name="sort_by" value="Year">
            Year
            <input type=radio name="sort_by" value="Price">
            Price<br>


            <input type="submit" value="Submit"> 
            </form>       

   <br>

    <section>

        <table>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
               
            </tr>

            <?php



                if ($vehicles) {    
                
                    foreach ($vehicles as $vehicle) : 
                    //format vehicle prices with $ + two decimal places
                    $price_f = "$".number_format($vehicle['Price'], 2); ?>
                        <tr>
                        <td><?php echo $vehicle['Year']; ?></td>
                        <td><?php echo $vehicle['vehicleMake']; ?></td>
                        <td><?php echo $vehicle['Model']; ?></td>
                        <td><?php echo $vehicle['vehicleTypes']; ?></td>
                        <td><?php echo $vehicle['vehicleClasses']; ?></td>
                        <td><?php echo $price_f; ?></td>  
                        </tr>
                    <?php endforeach; ?> 
                <?php } else { "There are no vehicles yet!"; } ?>


        </table>
        
        
    </section>



<?php include('view/footer.php'); ?>
