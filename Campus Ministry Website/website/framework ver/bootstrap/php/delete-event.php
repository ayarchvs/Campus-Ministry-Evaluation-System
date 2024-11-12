<?php
// config for database connection
include('../config/config.php'); 

// Check if the data sent
if(isset($_POST['username']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];


    // to stop em from adding sql querries in input field aka do cheat codes XD
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);


    // mi SQL query 
    $query = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
    
    
    // Execute the query
    if(mysqli_query($conn, $query)) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Please fill up required(*) fields.";
}

// Close the database connection
mysqli_close($conn);
?>
