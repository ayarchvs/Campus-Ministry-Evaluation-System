<?php
    include("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title> Register Page </title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/design.css">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
        background-image: url('../CMO/background2.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(8px); /* Adjust the blur level as needed */
        z-index: -1; /* Send the blur effect behind other elements */
        }

        /* .signup-container {
            max-width: 500px;
            width: 420px;
            background-color: whitesmoke;
            padding: 2rem;
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        } */

        label {
            color: white;
        }
        
        .colorheader {
            background: #001594;
            text-align: center;
            padding: 28px 0; 
            position: fixed;
            top: 0; 
            left: 0; 
            width: 100%;
            z-index: 1; 
        }

        #toggle-button {
            position: absolute; 
            top: 20px; 
            left: 20px;
            z-index: 2; 
        }

        .sidebar {
            position: fixed;
            left: -250px;
            width: 245px;
            height: 100%;
            top: 0;
            background: #1b2457;
            transition: all 0.5s ease;
            font-size: 10px;
            z-index: 1; 
        }

        /* Sidebar Header */
        .sidebar header {
            position: absolute;
            top: 0; 
            left: 0;
            font-size: 16px;
            color: white;
            background-color: #001594;
            width: 100%;
            line-height: 56px;
            text-align: center;
            /* margin-left: 30px; */
            user-select: none;
        }

        .sidebar ul {
            list-style-type: none; 
            padding-top: 80px;
            margin: 0;
        }

        .sidebar ul a {
            margin-top: 5px;
            display: block;
            /* height: 100%; */
            /* width: 100%; */
            line-height: 40px;
            font-size: 15px;
            color: white;
            padding-left: 5px;
            /* box-sizing: border-box; */
            /* border-bottom: 1px solid black; */
            /* border-top: 1px solid rgba(255, 255, 255, .1); */
            transition: 0.4s;
            text-decoration: none;
        }

        ul li:hover a {
            padding-left: 50px;
        }

        .sidebar ul a i {
            margin-right: 10px;
        }
      
          /* Three Dots */
          label #btn, label #cancel {
              position: absolute;
              background: #001594;
              /* border-radius: 3px; */
              border: none;
              cursor: pointer;
              width: 45px;
              margin-right: 0;
              margin-top:0;
          }

          /* Three Dots Size */
          label #btn {
              left: 0px;
              top: 0px;
              font-size: 20px;
              color: white;
              padding: 0px 12px;
              transition: all 0.5s;
          }

          /* X */
          label #cancel {
              z-index: 1;
              left: -100px;
              top: 0;
              font-size: 20px;
              color: #0a5275;
              background-color: transparent;
              padding-top: 0;
              /* margin-left: 20; */
              transition: all 0.5s ease;
          }

          label #cancel:hover {
             color: red;
          }

          /* Checkbox  */
          #check {
            display: none;
          }
          
          #check:checked ~ .sidebar {
              left: 0;
          }

          #check:checked ~ label #btn {
              left: 250px;
              opacity: 0;
              pointer-events: none;
          }

          #check:checked ~ label #cancel {
              left: 200px;
          }

          #check:checked ~ section {
              margin-left: 250px;
          }
    </style>

    <body>
        <div class="colorheader"> </div> 

        <input type="checkbox" id="check">
            <label for="check" id="toggle-button">
                <i class="fas fa-bars" id="btn"></i>
                <i class="fas fa-times" id="cancel"></i>
            </label>

        <div class="sidebar">
        <header class="cm"></headerclass> nav </header>
        <!-- <img src="logo.jpg" class="logo" alt="cmo"> -->

          <ul>
              <li><a href="AddEvent.php"><i class="fas fa-qrcode"></i> Add Event</a></li>
              <li><a href="EventList.php"><i class="fas fa-link"></i> Event List</a></li>
              <li><a href="register.php"><i class="fas fa-stream"></i> Register</a></li>     
              <li><a href="#"><i class="fas fa-calendar-week"></i> Help</a></li>
              <li><a href="#"><i class="far fa-question-circle"></i> GForm Help</a></li>
              <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
          </ul>
        </div>

      <section></section>
      
        <div class = "signup-container">
            <form action="" method="POST">

                <!-- <center>
                    <img src="CMOlogo.png" class="cmologo" alt="cmo">
                </center>  -->

                <h2 class="text"> Register Account </h2>

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Name" required> 
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="type" name="type" placeholder="Staff Type" required> 
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required> 
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required> 
                </div>

                <center>
                    <input type="submit" class="btn btn-success" name="submit" value="Register">
                </center>

                <!-- Offline Bootstrap -->
                <script src="js/all.js"></script>
                <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
            </form>

        </div>
    </body>
</html>

<?php
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $type = $_POST["type"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if(!empty($username) && !empty($type) && !empty($password) && !empty($email)){

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO staff (S_Name, S_Type, S_Password, S_Email) VALUES (?, ?, ?, ?) ");
            $stmt->bind_param("ssss", $username, $type, $hashed_password, $email);

                if($stmt->execute()) {
                    // echo "User Created Succesfully!";
                    echo "<script>alert('Account Added Successfully!'); window.location.href = 'register.php';</script>";
                }else{
                    echo "Error Creating User";
                }
                   
                $stmt->close();
        }else{
            echo "Error!"; // plz fill in all fields bro
        }
    }

    mysqli_close($conn);
?>

