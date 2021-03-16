<?php 
include('view/header.php'); ?>

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
        <a href="index.php">Return to Vehicle List</a><br>

        </table>



    </section>



<?php
incldue('view/footer.php'); ?>