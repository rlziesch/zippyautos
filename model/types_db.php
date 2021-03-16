<?php

// Get all types
function get_types($type_id) {
global $db;
$query = 'SELECT * FROM types
                       ORDER BY typeID';
$statement = $db->prepare($query);
$statement->execute();
$types = $statement->fetchAll();
$statement->closeCursor();
return $types;
}

// Get name for type
function get_type_name($type_name) {
global $db;
$query = 'SELECT * FROM types
                  WHERE typeID = :type_id';
$statement = $db->prepare($query);
$statement->bindValue(':type_id', $type_id);
$statement->execute();
$type = $statement->fetch();
$type_name = $type['vehicleTypes'];
$statement->closeCursor();
return $type_name;
}

function delete_type($type_id) {
    global $db;
    $query = 'DELETE FROM types WHERE typeID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name) {
    global $db;
    $query = 'INSERT INTO types (vehicleTypes)
            VALUES (:type_name)'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}





?>