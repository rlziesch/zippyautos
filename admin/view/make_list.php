<?php 
include('view/header.php'); ?>

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
        <a href="index.php">Return to Vehicle List</a><br>

        </table>



    </section>



<?php
incldue('view/footer.php'); ?>