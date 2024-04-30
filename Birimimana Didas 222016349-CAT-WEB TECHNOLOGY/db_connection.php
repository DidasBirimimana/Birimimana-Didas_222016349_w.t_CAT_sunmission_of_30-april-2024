<?php
// Connection details
    $host = "localhost";
    $user = "Didas 222016349";
    $pass = "Didas222016349";
    $database = "graduate_student_management";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>