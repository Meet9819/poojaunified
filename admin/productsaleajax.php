<?php
// Debugging (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "d.php"; // your DB connection file

if (isset($_POST['id'], $_POST['status'])) {
    $id     = (int) $_POST['id'];       // cast to int for safety
    $status = (int) $_POST['status'];   // cast to int for safety

    // Prepared statement
    $stmt = $db->prepare("UPDATE products SET sale = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("ii", $status, $id);
        if ($stmt->execute()) {
            echo "1"; // success
        } else {
            echo "0"; // execution failure
        }
        $stmt->close();
    } else {
        echo "0"; // preparing failed
    }

} else {
    echo "0"; // invalid request
}
?>
