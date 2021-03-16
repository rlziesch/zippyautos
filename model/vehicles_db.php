<?php

// get all vehicles AND sort by price descending
// inner join the other tables to get names, not just ID numbers
function get_vehicles($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
            INNER JOIN types
            ON vehicles.type_ID = types.typeID
            INNER JOIN makes
            ON vehicles.make_ID = makes.make_ID
            INNER JOIN classes
            ON vehicles.class_ID = classes.class_ID
            ORDER BY Price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
    }

function get_vehicle_by_class($class_id) {
    global $db;
        $query = 'SELECT * FROM vehicles
                INNER JOIN types
                ON vehicles.type_ID = types.typeID
                INNER JOIN makes
                ON vehicles.make_ID = makes.make_ID
                INNER JOIN classes
                ON vehicles.class_ID = classes.class_ID
                WHERE class_ID = :class_id
                ORDER BY vehicles.Price DESC';
         $statement = $db->prepare($query);
         $statement->bindValue('class_id', $class_id);
         $statement->execute();
         $vehicles = $statement->fetchAll();
         $statement->closeCursor();
         return $vehicles;
}

function get_vehicle_by_type($type_id) {
    global $db;
        $query = 'SELECT * FROM vehicles
                INNER JOIN types
                ON vehicles.type_ID = types.typeID
                INNER JOIN makes
                ON vehicles.make_ID = makes.make_ID
                INNER JOIN classes
                ON vehicles.class_ID = classes.class_ID
                WHERE typeID = :type_id
                ORDER BY vehicles.Price DESC';
         $statement = $db->prepare($query);
         $statement->bindValue('type_id', $type_id);
         $statement->execute();
         $vehicles = $statement->fetchAll();
         $statement->closeCursor();
         return $vehicles;
}

function get_vehicle_by_make($make_id) {
    global $db;
        $query = 'SELECT * FROM vehicles
                INNER JOIN types
                ON vehicles.type_ID = types.typeID
                INNER JOIN makes
                ON vehicles.make_ID = makes.make_ID
                INNER JOIN classes
                ON vehicles.class_ID = classes.class_ID
                WHERE make_ID = :make_id
                ORDER BY vehicles.Price DESC';
         $statement = $db->prepare($query);
         $statement->bindValue('make_id', $make_id);
         $statement->execute();
         $vehicles = $statement->fetchAll();
         $statement->closeCursor();
         return $vehicles;
}


?>