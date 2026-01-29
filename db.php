<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "aqwareach"; // Change this to your database name

// NOTE:
// - This file should NEVER echo/die(), because it's included by JSON endpoints.
// - Endpoints should check $conn and return their own JSON error response.
$conn = null;
$db_error = null;

mysqli_report(MYSQLI_REPORT_OFF);

// Connect to MySQL server (without selecting DB first, so we can create/select it)
$tmp = @new mysqli($servername, $username, $password);
if ($tmp->connect_error) {
    $db_error = "Connection failed: " . $tmp->connect_error;
} else {
    $tmp->set_charset('utf8mb4');

    // Ensure database exists (works well for local XAMPP setups)
    if (@$tmp->query("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci") === false) {
        $db_error = "Database error: " . $tmp->error;
    } elseif (@$tmp->select_db($dbname) === false) {
        $db_error = "Database error: " . $tmp->error;
    } else {
        $conn = $tmp;
    }
}

function sanitizeInput($data) {
    global $conn;
    $data = trim((string)($data ?? ''));
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // If DB connection exists, escape for SQL too.
    if ($conn instanceof mysqli) {
        $data = $conn->real_escape_string($data);
    }

    return $data;
}
?>