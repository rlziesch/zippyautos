<?php 
include('view/header.php'); ?>

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
        <a href="index.php">Return to Vehicle List</a><br>

        </table>



    </section>



<?php
incldue('view/footer.php'); ?>