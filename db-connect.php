<?php

// Handling connection errors

try {
    $username = "root";
    $password = "";

    // Create connection
    $db = new PDO("mysql:host=localhost;dbname=eoffice", $username, $password);
}
catch (PDOException $e) {
    // Output error message if connection failed
    die("Error occured: " . $e->getMessage());
}
?>