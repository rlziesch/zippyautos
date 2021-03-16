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

 
$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}


// call 

$makes = get_makes($make_id);
$classes = get_classes($class_id);
$types = get_types($type_id);
$vehicles = get_vehicles($vehicle_id);



// header 

include('view/header.php'); ?>

        <?php //category drop downs and radio buttons ?>

        <form action="index.php" method="post"
              id="list_vehicles">

            <br>
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


            <button input type="submit" value="Submit"> Submit </button>
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

// start switch note--refer to p.248-249 + ch 08 ex2
            // take action based on variable in POST array

            switch($action) {
                case 'vehicle_list':

                    if ($type_id) {
                        
                        foreach ($vehicles as $vehicle) : 
                            //format vehicle prices with $ + two decimal places
                        $price_f = "$".number_format($vehicle['Price'], 2);
                        $vehicles = get_vehicles_by_type($type_id);?>
                                <tr>
                                <td><?php echo $vehicle['Year']; ?></td>
                                <td><?php echo $vehicle['vehicleMake']; ?></td>
                                <td><?php echo $vehicle['Model']; ?></td>
                                <td><?php echo $vehicle['vehicleTypes']; ?></td>
                                <td><?php echo $vehicle['vehicleClasses']; ?></td>
                                <td><?php echo $price_f; ?></td>  
                                </tr>
                        <?php endforeach; 
                     
                     } else if ($make_id) {

                        foreach ($vehicles as $vehicle) : 
                        $price_f = "$".number_format($vehicle['Price'], 2); 
                        $vehicles = get_vehicles_by_make($make_id); ?>
                                <tr>
                                <td><?php echo $vehicle['Year']; ?></td>
                                <td><?php echo $vehicle['vehicleMake']; ?></td>
                                <td><?php echo $vehicle['Model']; ?></td>
                                <td><?php echo $vehicle['vehicleTypes']; ?></td>
                                <td><?php echo $vehicle['vehicleClasses']; ?></td>
                                <td><?php echo $price_f; ?></td>  
                                </tr>
                        <?php endforeach;

                     } else if ($class_id) {

                        foreach ($vehicles as $vehicle) : 
                        $price_f = "$".number_format($vehicle['Price'], 2); 
                        $vehicles = get_vehicles_by_class($class_id); ?>
                                <tr>
                                <td><?php echo $vehicle['Year']; ?></td>
                                <td><?php echo $vehicle['vehicleMake']; ?></td>
                                <td><?php echo $vehicle['Model']; ?></td>
                                <td><?php echo $vehicle['vehicleTypes']; ?></td>
                                <td><?php echo $vehicle['vehicleClasses']; ?></td>
                                <td><?php echo $price_f; ?></td>  
                                </tr>
                        <?php endforeach;
                    }
                    break;

                    default:
                        foreach ($vehicles as $vehicle) : 
                        $price_f = "$".number_format($vehicle['Price'], 2); 
                        $vehicles = get_vehicles($vehicle_id); ?>
                                <tr>
                                <td><?php echo $vehicle['Year']; ?></td>
                                <td><?php echo $vehicle['vehicleMake']; ?></td>
                                <td><?php echo $vehicle['Model']; ?></td>
                                <td><?php echo $vehicle['vehicleTypes']; ?></td>
                                <td><?php echo $vehicle['vehicleClasses']; ?></td>
                                <td><?php echo $price_f; ?></td>  
                                </tr>
                        <?php endforeach;
                    break; 
                
                
                }
            ?>


        </table>
                <br>
        <a href="add_vehicle_form.php">Add Vehicle</a><br>
        <a href="class_list.php">View Class List</a><br>
        
        
    </section>



<?php include('view/footer.php'); ?>
