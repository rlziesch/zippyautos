<?php 
include('view/header.php');
require('../../model/database.php');
require('../../model/makes_db.php');?>

<h2> Make List </h2>

    <section>
    <table>
        <tr>
            <th>Make</th>
        </tr>
    <?php
        $make = get_make_name($make_name);

        foreach ($makes as $make) : ?>
                <tr>
                    <td><?php echo $make['vehicleMake']; ?></td>
                
                </tr>
        <?php endforeach; ?>
        <br>
        <p><a href="../index.php">View Vehicle List</a></p>

        </table>



    </section>



<?php
include('view/footer.php'); ?>