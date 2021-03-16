<?php

// needed pages
include('header.php');
include('footer.php');
require('..model/database.php');

// Get all vehicles
$vehicles = get_vehicles($vehicle_id);

?>

        <h1>Add Vehicle</h1>
        <form action="add_vehicle.php" method="post"
              id="add_vehicle_form">

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
            </select><select name="make_id">
                <option value=".">Select Make</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['make_ID']; ?>">
                    <?php echo $make['vehicleMake']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <select name="class_id">
                <option value=".">Select Class</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['class_ID']; ?>">
                    <?php echo $class['vehicleClasses']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <select name="type_id">
                <option value=".">Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['vehicleTypes']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <label>Year:</label>
            <input type="text" name="year"><br>

            <label>Model:</label>
            <input type="text" name="model"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle"><br>
        </form>
        <p><a href="index.php">View Vehicle List</a></p>
    