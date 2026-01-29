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

// Fail fast if DB connection failed
if (!isset($conn) || !($conn instanceof mysqli) || $conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
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
// REQUEST METHOD CHECK
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
// GET & SANITIZE INPUTS
// ===============================
$firstName = sanitizeInput($_POST['firstName'] ?? '');
$lastName = sanitizeInput($_POST['lastName'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$phone = sanitizeInput($_POST['phone'] ?? '');
$company = sanitizeInput($_POST['company'] ?? '');
$businessType = sanitizeInput($_POST['businessType'] ?? '');
$isEvent = sanitizeInput($_POST['isEvent'] ?? '');
$distributionAddress = sanitizeInput($_POST['distributionAddress'] ?? '');
$shippingAddress = sanitizeInput($_POST['shippingAddress'] ?? '');
$footTraffic = sanitizeInput($_POST['footTraffic'] ?? '');
$ageRange = sanitizeInput($_POST['ageRange'] ?? '');
$monthlyVolume = sanitizeInput($_POST['monthlyVolume'] ?? '');
$loadingDock = sanitizeInput($_POST['loadingDock'] ?? '');
$whyDistribute = sanitizeInput($_POST['whyDistribute'] ?? '');
$shareWithAdvertisers = isset($_POST['shareWithAdvertisers']) ? 'yes' : 'no';

// ===============================
// VALIDATION
// ===============================
$errors = [];

if (empty($firstName)) $errors[] = 'First name is required';
if (empty($lastName)) $errors[] = 'Last name is required';

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Invalid email format';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed',
        'errors' => $errors
    ]);
    exit;
}

// ===============================
// CREATE TABLE IF NOT EXISTS
// ===============================
$createTableSQL = "
CREATE TABLE IF NOT EXISTS distribute_requests (
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
    INSERT INTO distribute_requests (
        first_name, last_name, email, phone, company, business_type,
        is_event, distribution_address, shipping_address,
        foot_traffic, age_range, monthly_volume,
        loading_dock, why_distribute, share_with_advertisers
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
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
    "sssssssssssssss",
    $firstName,
    $lastName,
    $email,
    $phone,
    $company,
    $businessType,
    $isEvent,
    $distributionAddress,
    $shippingAddress,
    $footTraffic,
    $ageRange,
    $monthlyVolume,
    $loadingDock,
    $whyDistribute,
    $shareWithAdvertisers
);

// ===============================
// EXECUTE
// ===============================
if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Distribution request submitted successfully'
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
