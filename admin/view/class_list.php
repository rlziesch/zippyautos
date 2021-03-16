<?php 
include('view/header.php'); 
require('../../model/database.php');
require('../../model/classes_db.php');

$classes = get_classes($class_id);
?>

<h2> Class List </h2>

    <section>
    <table>
        <tr>
            <th>Class</th>
        </tr>
    <?php
        $class = get_class_name($class_name);

        foreach ($classes as $class) : ?>
                <tr>
                    <td><?php echo $class['vehicleClasses']; ?></td>
                
                </tr>
        <?php endforeach; ?>
        <br>
        <p><a href="../index.php">View Vehicle List</a></p>

        </table>



    </section>



<?php
include('view/footer.php'); ?>