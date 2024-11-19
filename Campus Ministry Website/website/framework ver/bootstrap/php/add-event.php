<?php
include '../config/config.php';
include '../access_control.php';  // Include the access control file
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the user is logged in and Staff_ID is available
    if (!isset($_SESSION['Staff_ID'])) {
        echo "You must be logged in to add an event.";
        exit;
    }

    // Get logged-in Staff_ID from session
    $staff_id = $_SESSION['Staff_ID'];

    // Get and sanitize form data
    $eventType = filter_input(INPUT_POST, 'eventType', FILTER_SANITIZE_STRING);
    $eventMonth = filter_input(INPUT_POST, 'eventMonth', FILTER_VALIDATE_INT);
    $eventDay = filter_input(INPUT_POST, 'eventDay', FILTER_VALIDATE_INT);
    $eventYear = filter_input(INPUT_POST, 'eventYear', FILTER_VALIDATE_INT);
    $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
    $location = filter_input(INPUT_POST, 'eventLocation', FILTER_SANITIZE_STRING);

    // Check if the user has permission to add this event type
    if (!can_manage_event($eventType)) {
        echo "You do not have permission to add this type of event.";
        exit;
    }

    // Handle file upload
    $fileRef = null;
    if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
        $uploadDir = '../Evaluation Forms/';
        $fileRef = $uploadDir . basename($_FILES['excelFile']['name']);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!move_uploaded_file($_FILES['excelFile']['tmp_name'], $fileRef)) {
            echo "File upload failed.";
            exit;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO event (Staff_ID, E_Type, E_Year, E_Month, E_Day, E_Religion, E_Location, E_file_ref) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiiisss", $staff_id, $eventType, $eventYear, $eventMonth, $eventDay, $religion, $location, $fileRef);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>