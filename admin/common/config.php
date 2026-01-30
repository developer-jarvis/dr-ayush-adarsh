<?php
$host = "localhost";
$user = "u467991428_ayush_user";
$pass = "Rb7=WN9a";
$dbname = "u467991428_ayush_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>