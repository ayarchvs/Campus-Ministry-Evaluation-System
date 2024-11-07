<?php

/*
// Database connection settings
$servername = "localhost";
$username = "root";  // Your MySQL username
$password = "";      // Your MySQL password
$dbname = "campus_ministry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/


// use the config file   .. to go to root
include("../config/config.php"); 
session_start(); 



// ========== Connection ========= //



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $eventType = $_POST['eventType'];
    $eventMonth = $_POST['eventMonth'];
    $eventDay = $_POST['eventDay'];
    $eventYear = $_POST['eventYear'];
    $religion = $_POST['religion'];
    $eventLocation = $_POST['eventLocation'];
    $courses = $_POST['courses'];
    
    // Handle file upload
    $file = $_FILES['excelFile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Check if file is uploaded successfully
    if ($fileError === 0) {
        $fileExt = strtolower(end(explode('.', $fileName)));
        $allowed = array('xlsx');
        
        if (in_array($fileExt, $allowed)) {
            // Specify the directory for file storage
            $uploadDir = 'D:\xampp\htdocs\Campus-Ministry-Evaluation-System\Campus Ministry Website\website\Evaluation Forms'; //just change the directory for this
            
            // Ensure directory exists (you can create it manually or programmatically)
            if (!is_dir($uploadDir)) {
                echo "Directory does not exist.";
                exit();
            }
            
            // Use the original file name for upload
            $fileDestination = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

            // Move the uploaded file to the specified folder
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // File uploaded successfully
            } else {
                echo "There was an error moving the uploaded file.";
                exit();
            }
        } else {
            echo "You cannot upload files of this type.";
            exit();
        }
    } else {
        echo "There was an error uploading your file.";
        exit();
    }

    // Prepare the SQL statement to insert event data into the database
    $sql = "INSERT INTO event (E_Name, E_Year, E_Month, E_Day, E_Religion, E_Location, E_file_ref) 
            VALUES ('$eventType', '$eventYear', '$eventMonth', '$eventDay', '$religion', '$eventLocation', '$fileName')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the dashboard with success message
        header("Location: index.html?message=successful");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
