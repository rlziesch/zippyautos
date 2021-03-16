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

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($vehicles as $vehicle) : ?>
                <option value="<?php echo $vehicle['vehicle_id']; ?>">
                    <?php echo $vehicle['vehicle_name']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label>Code:</label>
            <input type="text" name="code"><br>

            <label>Name:</label>
            <input type="text" name="name"><br>

            <label>List Price:</label>
            <input type="text" name="price"><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="index.php">View Product List</a></p>
    