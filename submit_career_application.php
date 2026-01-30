<?php
// Include database connection
require_once 'db.php';

// Set response header for JSON
header('Content-Type: application/json');

// Fail fast if DB is unavailable
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
$firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : '';
$lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$position = isset($_POST['position']) ? trim($_POST['position']) : '';
$experience = isset($_POST['experience']) ? trim($_POST['experience']) : '';
$coverLetter = isset($_POST['coverLetter']) ? trim($_POST['coverLetter']) : '';
$linkedin = isset($_POST['linkedin']) ? trim($_POST['linkedin']) : '';
$portfolio = isset($_POST['portfolio']) ? trim($_POST['portfolio']) : '';

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

if (empty($phone)) {
    $errors[] = 'Phone number is required';
}

if (empty($position)) {
    $errors[] = 'Position is required';
}

if (empty($coverLetter)) {
    $errors[] = 'Cover letter is required';
}

// If there are validation errors, return them
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation errors', 'errors' => $errors]);
    exit;
}

// Store raw names for filename creation (before HTML escaping)
$firstNameRaw = $firstName;
$lastNameRaw = $lastName;

// Sanitize inputs for database
$firstName = htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8');
$lastName = htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$position = htmlspecialchars($position, ENT_QUOTES, 'UTF-8');
$experience = htmlspecialchars($experience, ENT_QUOTES, 'UTF-8');
$coverLetter = htmlspecialchars($coverLetter, ENT_QUOTES, 'UTF-8');
$linkedin = htmlspecialchars($linkedin, ENT_QUOTES, 'UTF-8');
$portfolio = htmlspecialchars($portfolio, ENT_QUOTES, 'UTF-8');

// Handle file upload (resume)
$resumePath = null;
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/resumes/';
    
    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    $allowedExtensions = ['pdf', 'doc', 'docx'];
    $fileName = $_FILES['resume']['name'];
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    if (in_array($fileExtension, $allowedExtensions)) {
        // Create filename from candidate name (using raw names)
        $candidateName = trim($firstNameRaw . '_' . $lastNameRaw);
        
        // Sanitize filename: remove special characters, replace spaces with underscores
        $candidateName = preg_replace('/[^a-zA-Z0-9_-]/', '', $candidateName);
        $candidateName = preg_replace('/\s+/', '_', $candidateName); // Replace multiple spaces with single underscore
        $candidateName = strtolower($candidateName);
        
        // If name is empty after sanitization, use a fallback
        if (empty($candidateName)) {
            $candidateName = 'candidate';
        }
        
        // Create base filename
        $baseFileName = $candidateName . '.' . $fileExtension;
        $uploadPath = $uploadDir . $baseFileName;
        
        // Handle duplicate filenames by adding a number
        $counter = 1;
        while (file_exists($uploadPath)) {
            $baseFileName = $candidateName . '_' . $counter . '.' . $fileExtension;
            $uploadPath = $uploadDir . $baseFileName;
            $counter++;
        }
        
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadPath)) {
            $resumePath = $uploadPath;
        }
    }
}

// Create table if it doesn't exist
$createTableSQL = "CREATE TABLE IF NOT EXISTS career_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    position VARCHAR(255) NOT NULL,
    experience VARCHAR(50),
    cover_letter TEXT NOT NULL,
    linkedin_url VARCHAR(255),
    portfolio_url VARCHAR(255),
    resume_path VARCHAR(255),
    status VARCHAR(20) DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSQL)) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO career_applications (first_name, last_name, email, phone, position, experience, cover_letter, linkedin_url, portfolio_url, resume_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if ($stmt === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("ssssssssss", $firstName, $lastName, $email, $phone, $position, $experience, $coverLetter, $linkedin, $portfolio, $resumePath);

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Application submitted successfully! We will review your application and get back to you soon.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error submitting application: ' . $stmt->error]);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

