<?php
    include("config/config.php"); 
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Admin credentials
    $admin_email = 'admin@adzu.edu.ph';
    $admin_password = 'adminpassword';

    if (!empty($email) && !empty($password)) {
        
        if ($email === $admin_email && $password === $admin_password) {
            $_SESSION['email'] = $admin_email;
            $_SESSION['username'] = "admin";  //Set username as 'admin'
            header("Location: main-page.php");
            exit;
        }

        //Staff login logic
        $stmt = $conn->prepare("SELECT Staff_ID, S_Password, S_Name FROM `staff` WHERE `S_Email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($staff_id, $hashed_password, $name);
            $stmt->fetch();

            
            if (password_verify($password, $hashed_password)) {
                
                $_SESSION['Staff_ID'] = $staff_id;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $name;

                echo "Login successful! Welcome, " . htmlspecialchars($name) . ".";
                header("Location: main-page.php");
                exit;
            } else {
                echo "<script>
                        alert('Wrong Password');
                        window.location.href = 'index.php';
                      </script>";
                exit;
            }
        } else {
            
            echo "<script>
                    alert('Account Not Found');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Both email and password are required.');
                window.location.href = 'index.php';
              </script>";
        exit;
    }
}


mysqli_close($conn);
?>