<?php
// add-staff.php

include "../config/config.php";  // Include your DB connection

// Check if ID is provided via POST
if (isset($_POST['staffFirstName'], $_POST['staffLastName'], $_POST['staffType'], $_POST['staffEmail'], $_POST['staffPassword'])) {
    

    // Retrieve posted data
    //$staffID = $_POST['staffId'];




    $staffFirstName = $_POST['staffFirstName'];
    $staffLastName = $_POST['staffLastName'];
    $staffType = $_POST['staffType'];
    $staffEmail = $_POST['staffEmail'];
    $staffPassword = $_POST['staffPassword'];

    $Name = $staffLastName . ", " . $staffFirstName;  // Concatenate names



    // Hash the password using bcrypt
    $hashedPassword = password_hash($staffPassword, PASSWORD_DEFAULT);

    // SQL query to update staff data
    $query = "INSERT INTO staff (S_Name, S_Type, S_Password, S_Email) VALUES  ('$Name', '$staffType', '$hashedPassword', '$staffEmail"."@adzu.edu.ph"."')";
    $result = $conn->query($query);

    if (!$result) {
        // If query fails, return the error message in JSON
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    } else {
        echo json_encode(['status' => 'success']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Incomplete data provided.']);
}

?>