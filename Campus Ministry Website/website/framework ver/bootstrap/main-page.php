<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <!--  nav start  -->

        <?php

            include "modules/navigation-panel.php";

        
        ?>

            <!-- end nav panel -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Event List</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Event List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Event List
                                
                            </div>
                            <?php
                                include "config/config.php";

                                // Create a SQL query to select all data from the Events table
                                $query = "SELECT * FROM `event`";
                            
                                // Execute the query
                                $result = mysqli_query($conn, $query);
                            ?>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        
                                            <th>Event Date</th>
                                            <th>Event Type</th>
                                            <th>Religion</th>
                                            <th>Location</th>
                                            <th >Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Event Date</th>
                                            <th>Event Type</th>
                                            <th>Religion</th>
                                            <th>Location</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                             // Check if the query returned any results
                                            if (mysqli_num_rows($result) > 0) {
                                                // Fetch and display each row of data
                                                while($row = mysqli_fetch_assoc($result)) {
                                                     echo "<tr>";
                                                     echo "<td>". $row['E_Year']. " / " . $row['E_Month']. " / " . $row['E_Day']. "</td>";
                                                     echo "<td>". $row['E_Type']. "</td>";
                                                     echo "<td>". $row['E_Religion']. "</td>";
                                                     echo "<td>". $row['E_Location']. "</td>";
                                                     echo "<td>
                                                            <div class=\"d-flex align-items-center \">
                                                                <button class=\"btn btn-primary view-btn \" data-id=\"" . $row['Event_ID'] . "\">
                                                                    View
                                                                </button>
                                                                <span class=\"mx-2\"> </span>
                                                                <div class=\"dropdown\">
                                                                    <button class=\"btn btn-warning dropdown-toggle options-btn\" type=\"button\" id=\"dropdownMenuButton-<?=". $row['Event_ID']." ?>\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                                                        Options
                                                                    </button>
                                                                    <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">
                                                                        <button class=\"dropdown-item    update-btn\" data-id=\"". $row['Event_ID']."\">Update</a>
                                                                        <button class=\"dropdown-item    delete-btn\" data-id=\"". $row['Event_ID']."\">Delete action</a>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </td>";
                                                     echo "</tr>";
                                                }
                                            } else {
                                                echo "No records found.";
                                            }

                                            // YYYY/MM/DD   /// <a class=\"dropdown-item\" href=\"#\" class=\"update-btn\"   // removed href so no redirect page  , justify-content-center
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>




        <!-- Modal for Updating event -->
        <div class="modal fade" id="updateEventModal" tabindex="-1" aria-labelledby="updateEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEventModalLabel">Update Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateEventForm">
                <input type="hidden" id="updateEventId" name="eventId">
                
                <!-- Date -->
                <div class="row mb-3">
                    <!-- Month Field -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="updateEventMonth" name="eventMonth" type="number" placeholder="Day" min="1" max="12" required />
                            <label for="updateEventMonth">Month</label>
                        </div>
                    </div>

                    <!-- Day Field -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="updateEventDay" name="eventDay" type="number" placeholder="Day" min="1" max="31" required />
                            <label for="updateEventDay">Day</label>
                        </div>
                    </div>

                    <!-- Year Field -->
                    <div class="col-md-4">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="updateEventYear" name="eventYear" type="number" placeholder="Enter year" min="1900" max="2100" required />
                            <label for="updateEventYear">Year</label>
                        </div>
                    </div>
                </div>


                <!-- Event Type -->
                <div class="form-floating mb-3">
                    <select class="form-control" id="updateEventType" name="eventType" aria-label="Event Type" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Retreat">Retreat</option>
                        <option value="Recollection 02">Recollection 02</option>
                        <option value="Recollection 01">Recollection 01</option>
                    </select>
                    <label for="updateEventType">Event Type</label>
                </div>

                <!-- Religion -->
                <div class="form-floating mb-3">
                    <select class="form-control" id="updateEventReligion" name="religion" aria-label="Religion" required>
                        <option value="" disabled selected>Select</option>
                        <option value="Catholic">Catholic</option>
                        <option value="Muslim">Muslim</option>
                        <option value="Non-Christian">Non-Christian</option>
                    </select>
                    <label for="updateEventReligion">Religion</label>
                </div>


                <div class="mb-3">
                    <label for="updateEventLocation" class="form-label">Location</label>
                    <input type="text" class="form-control" id="updateEventLocation" name="location" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Event</button>
                </form>
            </div>
            </div>
        </div>
        </div>











        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"> // needed for the options dropdown // need dl local </script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js">  // needed for the options dropdown // need dl local </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"> // needed for the options dropdown // need dl local</script>
    
        <script src="js/options-event.js"> </script>
                                        <!--<script src="js/delete-event.js"> </script>-->
    
    </body>
</html>
