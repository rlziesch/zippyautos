<?php

// Get all classes
function get_classes($class_id) {
global $db;
$query = 'SELECT * FROM classes
                       ORDER BY class_ID';
$statement = $db->prepare($query);
$statement->execute();
$classes = $statement->fetchAll();
$statement->closeCursor();
return $classes;
}

// Get name for class
function get_class_name($class_name) {
global $db;
$queryCategory = 'SELECT * FROM classes
                  WHERE class_ID = :class_id';
$statement = $db->prepare($queryCategory);
$statement->bindValue(':class_id', $class_id);
$statement->execute();
$class = $statement->fetch();
$class_name = $class['vehicleClasses'];
$statement->closeCursor();
return $class_name;
}

function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM classes WHERE class_ID = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name) {
    global $db;
    $query = 'INSERT INTO classes (vehicleClasses)
            VALUES (:class_name)'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
    $statement->closeCursor();
}





?>