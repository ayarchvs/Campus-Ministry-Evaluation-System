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
                                                                <p class=\"mb-1 text-center \">
                                                                    <a href=\"\">view</a> 
                                                                    <span>&nbsp &nbsp | &nbsp &nbsp </span>
                                                                    <a href=\"\">options</a>
                                                                </p>
                                                            </td>";
                                                     echo "</tr>";
                                                }
                                            } else {
                                                echo "No records found.";
                                            }

                                            // YYYY/MM/DD
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
