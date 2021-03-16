<?php

// Get all makes
function get_makes($make_id) {
global $db;
$query = 'SELECT * FROM makes
                       ORDER BY make_ID';
$statement = $db->prepare($query);
$statement->execute();
$makes = $statement->fetchAll();
$statement->closeCursor();
return $makes;
}

// Get name for make

function get_make_name($make_name) {
global $db;
$query = 'SELECT * FROM makes
                  WHERE make_ID = :make_id';
$statement = $db->prepare($query);
$statement->bindValue(':make_id', $make_id);
$statement->execute();
$make = $statement->fetch();
$make_name = $make['vehicleMake'];
$statement->closeCursor();
return $make_name;
}

function delete_make($make_id) {
    global $db;
    $query = 'DELETE FROM makes WHERE make_ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $course_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name) {
    global $db;
    $query = 'INSERT INTO makes (vehicleMake)
            VALUES (:make_name)'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $statement->closeCursor();
}





?>