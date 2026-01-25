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
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$company = isset($_POST['company']) ? $_POST['company'] : '';
$businessType = isset($_POST['businessType']) ? $_POST['businessType'] : '';
$isEvent = isset($_POST['isEvent']) ? $_POST['isEvent'] : '';
$distributionAddress = isset($_POST['distributionAddress']) ? $_POST['distributionAddress'] : '';
$shippingAddress = isset($_POST['shippingAddress']) ? $_POST['shippingAddress'] : '';
$footTraffic = isset($_POST['footTraffic']) ? $_POST['footTraffic'] : '';
$ageRange = isset($_POST['ageRange']) ? $_POST['ageRange'] : '';
$monthlyVolume = isset($_POST['monthlyVolume']) ? $_POST['monthlyVolume'] : '';
$loadingDock = isset($_POST['loadingDock']) ? $_POST['loadingDock'] : '';
$whyDistribute = isset($_POST['whyDistribute']) ? $_POST['whyDistribute'] : '';
$shareWithAdvertisers = isset($_POST['shareWithAdvertisers']) ? 'yes' : 'no';

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

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation errors', 'errors' => $errors]);
    exit;
}

// Sanitize inputs
$firstName = sanitizeInput($firstName);
$lastName = sanitizeInput($lastName);
$email = sanitizeInput($email);
$phone = sanitizeInput($phone);
$company = sanitizeInput($company);
$businessType = sanitizeInput($businessType);
$isEvent = sanitizeInput($isEvent);
$distributionAddress = sanitizeInput($distributionAddress);
$shippingAddress = sanitizeInput($shippingAddress);
$footTraffic = sanitizeInput($footTraffic);
$ageRange = sanitizeInput($ageRange);
$monthlyVolume = sanitizeInput($monthlyVolume);
$loadingDock = sanitizeInput($loadingDock);
$whyDistribute = sanitizeInput($whyDistribute);

// Create table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS distribute_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(100),
    business_type VARCHAR(100),
    is_event VARCHAR(10),
    distribution_address TEXT,
    shipping_address TEXT,
    foot_traffic VARCHAR(50),
    age_range VARCHAR(50),
    monthly_volume VARCHAR(100),
    loading_dock VARCHAR(10),
    why_distribute TEXT,
    share_with_advertisers VARCHAR(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO distribute_requests (first_name, last_name, email, phone, company, business_type, is_event, distribution_address, shipping_address, foot_traffic, age_range, monthly_volume, loading_dock, why_distribute, share_with_advertisers) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("sssssssssssssss", $firstName, $lastName, $email, $phone, $company, $businessType, $isEvent, $distributionAddress, $shippingAddress, $footTraffic, $ageRange, $monthlyVolume, $loadingDock, $whyDistribute, $shareWithAdvertisers);

// Execute the statement
if ($stmt->execute()) {
    // Success
    echo json_encode(['success' => true, 'message' => 'Distribution request submitted successfully']);
} else {
    // Error occurred
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error submitting distribution request: ' . $stmt->error]);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
