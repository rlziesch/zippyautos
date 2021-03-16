<?php 
include('view/header.php');
require('../../model/database.php');
require('../../model/types_db.php');

$types = get_types($type_id);
?>

<h2> Type List </h2>

    <section>
    <table>
        <tr>
            <th>Type</th>
        </tr>
    <?php
        $type = get_type_name($type_name);

        foreach ($types as $type) : ?>
                <tr>
                    <td><?php echo $type['vehicleTypes']; ?></td>
                
                </tr>
        <?php endforeach; ?>
        <br>
        

        </table>
        <p><a href="../index.php">View Vehicle List</a></p>


    </section>



<?php
include('view/footer.php'); ?>