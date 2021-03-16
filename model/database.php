
<?php
$dsn = 'mysql:host=localhost;dbname=zippy_data';
$username = 'root';
//no $password

try {
    //establish connection to database
    $db = new PDO($dsn, $username);
    // echo "You are connected to the database.";
} //incase of error
    catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('.view/error.php');
    exit();
}

}

    
?>