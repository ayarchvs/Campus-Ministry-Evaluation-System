<!-- Login Page -->

<?php 
include("config.php"); 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Login Page </title>
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/design.css">
        
    </head>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('../CMO/background.jpg');
            background-size: cover;
            background-position: center; 
            background-repeat: no-repeat;
        }

        body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('../CMO/background.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(8px); /* blur level */
        z-index: -1; /* Send the blur effect behind other elements */
        }

        .signup-container {
            max-width: 500px;
            width: 400px;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
    </style>

    <body>
        <div class = "signup-container">
            <form action="" method="POST"> 

                <center>
                    <img src="CMOlogo.png" class="cmologo" alt="cmo">
                </center>   
                
                <h2 class="text"> Campus Ministry Login </h2>

                <div class="form-group">
                    <input type="text" class="form-control" style="" id="username" name="username" placeholder="Username" required> 
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required> 
                </div>

                <center>
                    <input type="submit" class="btn btn-success" name="submit" value="Login" a href="">
                </center>

                <script src="js/all.js"></script>
                <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
            </form>

        </div>    
    </body>
</html>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
        $username = $_POST['username']; 
        $password = $_POST['password']; 

        $admin_username = 'admin';
        $admin_password = 'adminpassword';

        if (!empty($username) && !empty($password)) { 

            if ($username === $admin_username && $password === $admin_password) {
                $_SESSION['username'] = $username;
                echo "Login successful! Welcome, Admin " . htmlspecialchars($username) . ".";
                header("Location: EventList.php");
                exit; 
            }

            $stmt = $conn->prepare("SELECT S_Password FROM `staff` WHERE `S_Name` = ?"); 
            $stmt->bind_param("s", $username); 
            $stmt->execute(); 
            $stmt->store_result(); 

            if ($stmt->num_rows == 1){ 
                $stmt->bind_result($hashed_password); 
                $stmt->fetch(); 

                if (password_verify($password, $hashed_password)){ 

                    $_SESSION['username'] = $username; 
                    echo "Login successful! Welcome, " . htmlspecialchars($username) . "."; 
                    header("Location: StaffEventList.php");
                }else{
                    echo "<script>alert('Account Not Found');</script>"; 
                }
            }else{
                echo "<script>alert('Account Not Found');</script>"; 
            }
    
            $stmt->close(); 
        }else{
            echo "Error!."; // fieldz are required ulit bro
        }
    }

    mysqli_close($conn);
?>