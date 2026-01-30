<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "aqwareach";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("DB connection failed");
}
