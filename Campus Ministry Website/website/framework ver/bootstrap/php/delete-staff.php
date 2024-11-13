<?php
// delete-staff.php

include "../config/config.php";  // Include your DB connection

// Check if ID is provided via GET
if (isset($_GET['id'])) {
    $staffId = $_GET['id'];

    // SQL query to delete the staff from the database
    $query = "DELETE FROM staff WHERE Staff_ID = '$staffId'";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        // Respond with success
        echo json_encode(['status' => 'success', 'message' => 'Staff deleted successfully.']);
    } else {
        // Respond with an error if deletion fails
        echo json_encode(['status' => 'error', 'message' => 'Error deleting Staff: ' . $conn->error]);
    }
} else {
    // If no ID is provided
    echo json_encode(['status' => 'error', 'message' => 'No ID provided.']);
}
?>
