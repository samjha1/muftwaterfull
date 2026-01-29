<?php
// ===============================
// DEBUG (remove in production)
// ===============================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ===============================
// HEADERS
// ===============================
header('Content-Type: application/json');

// ===============================
// DB CONNECTION
// ===============================
require_once 'db.php';

if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection unavailable'
    ]);
    exit;
}

// ===============================
// HELPER FUNCTION
// ===============================
function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// ===============================
// METHOD CHECK
// ===============================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed'
    ]);
    exit;
}

// ===============================
// GET INPUTS
// ===============================
$fullName     = sanitizeInput($_POST['fullName'] ?? '');
$email        = sanitizeInput($_POST['email'] ?? '');
$phone        = sanitizeInput($_POST['phone'] ?? '');
$company      = sanitizeInput($_POST['company'] ?? '');
$businessType = sanitizeInput($_POST['businessType'] ?? '');
$advertise    = sanitizeInput($_POST['advertise'] ?? '');
$budget       = sanitizeInput($_POST['budget'] ?? '');
$message      = sanitizeInput($_POST['message'] ?? '');

// ===============================
// VALIDATION
// ===============================
$errors = [];

if (empty($fullName)) $errors[] = 'Full name is required';

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($company)) $errors[] = 'Company name is required';

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation errors',
        'errors' => $errors
    ]);
    exit;
}

// ===============================
// CREATE TABLE
// ===============================
$createTableSQL = "
CREATE TABLE IF NOT EXISTS quote_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(100) NOT NULL,
    business_type VARCHAR(50),
    advertise TEXT,
    budget VARCHAR(20),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Table creation failed',
        'error' => $conn->error
    ]);
    exit;
}

// ===============================
// INSERT DATA
// ===============================
$stmt = $conn->prepare("
    INSERT INTO quote_requests
    (full_name, email, phone, company, business_type, advertise, budget, message)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
");

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Prepare failed',
        'error' => $conn->error
    ]);
    exit;
}

$stmt->bind_param(
    "ssssssss",
    $fullName,
    $email,
    $phone,
    $company,
    $businessType,
    $advertise,
    $budget,
    $message
);

// ===============================
// EXECUTE
// ===============================
if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Quote request submitted successfully'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Insert failed',
        'error' => $stmt->error
    ]);
}

// ===============================
// CLEANUP
// ===============================
$stmt->close();
$conn->close();
