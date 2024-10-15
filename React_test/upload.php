<?php
// Define the target directory where the file will be saved
$targetDir = "Evaluation forms/"; // Ensure this folder exists
$targetFile = $targetDir . basename($_FILES["file"]["name"]);

// Allow only certain file formats
$allowedTypes = array("xls", "xlsx", "csv");
$fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the uploaded file is an allowed type
if (in_array($fileType, $allowedTypes)) {
    // Try to upload the file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        //if its sucessful this will display
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Sorry, only Excel files (xls, xlsx) and CSV files are allowed.";
}
?>
