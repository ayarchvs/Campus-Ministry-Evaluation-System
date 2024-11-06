<?php
    include("config.php");
    session_start();

    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $E_Name = sanitize_input($_POST['eventname']);
        $E_Year = sanitize_input($_POST['eventyear']);
        $E_Month = sanitize_input($_POST['eventmonth']);
        $E_Day = sanitize_input($_POST['eventday']);
        $E_Religion = sanitize_input($_POST['eventreligion']);
        $E_Location = sanitize_input($_POST['eventlocation']);

        $sql = "INSERT INTO event (E_Name, E_Year, E_Month, E_Day, E_Religion, E_Location) VALUES ('$E_Name', '$E_Year', '$E_Month', 
        '$E_Day', '$E_Religion', '$E_Location')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Event Added Successfully!'); window.location.href = 'EventList.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Add Event Page</title>
        <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
        
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
             color: red;;
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

          <ul>
            <li><a href="AddEvent.php"><i class="fas fa-qrcode"></i> Add Event</a></li>
            <li><a href="EventList.php"><i class="fas fa-list"></i> Event List</a></li>
            <li><a href="register.php"><i class="fas fa-stream"></i> Register</a></li>     
            <li><a href="#"><i class="fas fa-calendar-week"></i> Help</a></li>
            <li><a href="#"><i class="far fa-question-circle"></i> GForm Help</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
          </ul>
        </div>

      <section></section>

            <form action="" method="POST"> 
                <!-- style="display: flex; flex-direction: column; " -->

                <h2 class="text" style="color: white"> Add Event </h2>

                <div class="form-group">
                    <!-- <label for="eventname">Event Name:</label> -->
                    <input type="text" class="form-control" id="eventname" name="eventname" placeholder="Event" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="eventyear" name="eventyear" placeholder="Year" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="eventmonth" name="eventmonth" placeholder="Month" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="eventday" name="eventday" placeholder="Day" required>
                </div>

                <div class="form-group">
                    <!-- <label for="eventreligion">Religion:</label> -->
                    <input type="text" class="form-control" id="eventreligion" name="eventreligion" placeholder="Religion" required>
                </div>

                <div class="form-group">
                    <!-- <label for="eventlocation">Location:</label> -->
                    <input type="text" class="form-control" id="eventlocation" name="eventlocation" placeholder="Location" required>
                </div>

                

                <div class="form-group">
                    <label for="eventfile"> File: </label>
                    <input type="file" class="form-control" id="eventfile" name="eventfile" required>
                </div>

                <center>
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                </center>
                
                <!-- Offline Bootstrap -->
                <script src="js/all.js"></script>
                <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
            </form>
            
            <!-- <div class="text-center mt-3 mb-3" >
                <a href="EventList.html" class="btn btn-secondary">Back to Event List</a>
            </div> -->

            <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    </body>
</html>