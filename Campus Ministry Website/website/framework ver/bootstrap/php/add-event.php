<?php

include '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $eventType = $_POST['eventType'];
    $eventMonth = $_POST['eventMonth'];
    $eventDay = $_POST['eventDay'];
    $eventYear = $_POST['eventYear'];
    $religion = $_POST['religion'];
    $location = $_POST['eventLocation'];

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
    $sql = "INSERT INTO event (E_Type, E_Year, E_Month, E_Day, E_Religion, E_Location, E_file_ref) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siissss", $eventType, $eventYear, $eventMonth, $eventDay, $religion, $location, $fileRef);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
