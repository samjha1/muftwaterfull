<?php
// Include database connection
require_once 'db.php';

// Set response header for JSON
header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get form data
$fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$businessType = isset($_POST['businessType']) ? $_POST['businessType'] : '';
$advertise = isset($_POST['advertise']) ? $_POST['advertise'] : '';
$budget = isset($_POST['budget']) ? $_POST['budget'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';

// Validate required fields
$errors = [];

if (empty($fullName)) {
    $errors[] = 'Full name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (empty($company)) {
    $errors[] = 'Company name is required';
}

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation errors', 'errors' => $errors]);
    exit;
}

// Sanitize inputs
$fullName = sanitizeInput($fullName);
$email = sanitizeInput($email);
$phone = sanitizeInput($phone);
$company = sanitizeInput($company);
$businessType = sanitizeInput($businessType);
$advertise = sanitizeInput($advertise);
$budget = sanitizeInput($budget);
$message = sanitizeInput($message);

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO quote_requests (full_name, email, phone, company, business_type, advertise, budget, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("ssssssss", $fullName, $email, $phone, $company, $businessType, $advertise, $budget, $message);

// Execute the statement
if ($stmt->execute()) {
    // Success
    echo json_encode(['success' => true, 'message' => 'Quote request submitted successfully']);
} else {
    // Error occurred
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error submitting quote request: ' . $stmt->error]);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>