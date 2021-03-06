<?php

// needed pages
include('header.php');
require('../../model/database.php');
require('../../model/vehicles_db.php');
require('../../model/makes_db.php');
require('../../model/types_db.php');
require('../../model/classes_db.php');


// Get all vehicles

$make_id = filter_input(INPUT_POST, 'make_id');
$type_id = filter_input(INPUT_POST, 'type_id');
$class_id = filter_input(INPUT_POST, 'class_id');
$vehicle_id = filter_input(INPUT_POST, 'vehicle_id');

$makes = get_makes($make_id);
$classes = get_classes($class_id);
$types = get_types($type_id);
$vehicles = get_vehicles($vehicle_id);

?>

<section>

        <h1>Add Vehicle</h1><br>

        <form action="add_vehicle.php" method="post"
              id="add_vehicle_form">

              <select name="make_id">
                <option value=".">Select Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['make_ID']; ?>">
                    <?php echo $make['vehicleMake']; ?>
                </option>
            <?php endforeach; ?>

            </select>
            <br>
            <select name="class_id">
                <option value=".">Select Classes</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_ID']; ?>">
                    <?php echo $class['vehicleClasses']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <br>
            <select name="type_id">
                <option value=".">Select Types</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['vehicleTypes']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            
            
            <br>
           
            <label>Year:</label>
            <input type="text" name="year"><br>

            <label>Model:</label>
            <input type="text" name="model"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle"><br>
        </form>

        <p><a href="../index.php">View Vehicle List</a></p>
    <section>

    <?php include('footer.php'); ?>