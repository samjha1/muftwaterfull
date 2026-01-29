<?php
// Include database connection
require_once 'db.php';

// Set response header for JSON
header('Content-Type: application/json');

// Fail fast if DB is unavailable (db.php is intentionally silent)
if (!($conn instanceof mysqli)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => isset($db_error) ? $db_error : 'Database connection unavailable']);
    exit;
}

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get form data
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Validate required fields
$errors = [];

if (empty($firstName)) {
    $errors[] = 'First name is required';
}

if (empty($lastName)) {
    $errors[] = 'Last name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($subject)) {
    $errors[] = 'Subject is required';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation errors', 'errors' => $errors]);
    exit;
}

// Sanitize inputs
// $firstName = sanitizeInput($firstName);
// $lastName = sanitizeInput($lastName);
// $email = sanitizeInput($email);
// $phone = sanitizeInput($phone);
// $subject = sanitizeInput($subject);
// $message = sanitizeInput($message);
$firstName = htmlspecialchars(trim($firstName));
$lastName  = htmlspecialchars(trim($lastName));
$email     = htmlspecialchars(trim($email));
$phone     = htmlspecialchars(trim($phone));
$subject   = htmlspecialchars(trim($subject));
$message   = htmlspecialchars(trim($message));

// Create table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS contact_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO contact_requests (first_name, last_name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $subject, $message);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Contact request submitted successfully']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error submitting contact request: ' . $stmt->error]);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

