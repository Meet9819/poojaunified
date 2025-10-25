<?php
// -----------------------------
// Debugging (remove in production)
// -----------------------------
error_reporting(E_ALL);
ini_set('display_errors', 1);

// -----------------------------
// Database connection
// -----------------------------
$db = new mysqli("localhost", "pmaroot", "yIGMS1+7fmOHmMasvamEkQ==", "crownstone");

// Check connection
if ($db->connect_errno) {
    die("Failed to connect to MySQL: " . $db->connect_error);
}

// -----------------------------
// Handle AJAX request
// -----------------------------
if (isset($_POST['id'], $_POST['status'])) {

    $id     = (int) $_POST['id'];       // cast to int for safety
    $status = (int) $_POST['status'];   // cast to int for safety

    // Prepared statement for security
    $stmt = $db->prepare("UPDATE products SET status = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ii", $status, $id);
        if ($stmt->execute()) {
            echo "1"; // success
        } else {
            echo "0"; // failure in execution
        }
        $stmt->close();
    } else {
        echo "0"; // failure in preparing
    }

} else {
    echo "0"; // invalid request
}

// -----------------------------
// Close DB connection
// -----------------------------
$db->close();
?>
