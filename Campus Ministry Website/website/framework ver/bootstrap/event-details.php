<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Event Details</title>
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
                <h1 class="mt-4">Retreat (2025/09/11)</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tables</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                    </div>
                </div>

                <!-- this container is for the event details -->
                <div class="container-fluid">
                    <!--details for religion and Course in one row-->
                    <?php

                    include "config/config.php";

                    if (isset($_GET['id'])) {
                        $eventId = $_GET['id'];
                    } else {
                    }
                    
                    $sql =  "SELECT * FROM `event` WHERE `Event_ID` = $eventId";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        // Fetch the row as an associative array
                        $row = mysqli_fetch_assoc($result);
                        $Religion = $row['E_Religion'];
                        $Location = $row['E_Location'];
                        $filePath = $row['E_file_ref'];
            
                        // Display the details
                        echo
                        '
                        <div class="row">
                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Religion</span>
                                    <input type="text" class="form-control" value="'.$Religion.'" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="input-group mb-4">
                                    <span class="input-group-text">Course</span>
                                    <input type="text" class="form-control" value="BSCS, BSIT, BSNMCA" disabled>
                                </div>
                            </div>
                        </div>


                        <!--details for religion and Course in one row (2)-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-5">
                                    <span class="input-group-text">Venue</span>
                                    <input type="text" class="form-control" value="'.$Location.'" disabled>
                                </div>
                            </div>
                        </div>'
                        ;
                    }
                    ?>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Evaluation Form Record
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Question Detail</th>
                                    <th>Poor(1)</th>
                                    <th>Fair(2)</th>
                                    <th>Good(3)</th>
                                    <th>Very Good(4)</th>
                                    <th>Excellent(5)</th>
                                </tr>
                            </thead>
                            <tfoot>

                                <!-- The headers, should be same as thead -->
                                <tr>
                                    <th>Question Detail</th>
                                    <th>Poor(1)</th>
                                    <th>Fair(2)</th>
                                    <th>Good(3)</th>
                                    <th>Very Good(4)</th>
                                    <th>Excellent(5)</th>
                                </tr>
                            </tfoot>

                            <tbody>


                                <!-- To poppulate table just have many of the preset for one table entry in the body -->

                                <!-- use Sheet js for reading excel files and input to table with datatables  -->
                                <!-- add it into the preset  -->

                                <!-- preset for the table one row entry -->
                                <tr>
                                    <td>Process</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>3</td>
                                    <td>19</td>
                                    <td>23</td>
                                </tr>
                                <!-- preset for the table one row entry -->


                                <tr>
                                    <td>Anchorpersons</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>3</td>
                                    <td>10</td>
                                    <td>34</td>
                                </tr>
                                <tr>
                                    <td>Schedules</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>4</td>
                                    <td>15</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>Confession / Mass</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>2</td>
                                    <td>10</td>
                                    <td>29</td>
                                </tr>
                                <tr>
                                    <td>Venue / Facilities</td>
                                    <td>0</td>
                                    <td>2</td>
                                    <td>2</td>
                                    <td>20</td>
                                    <td>21</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Stacked Bar Chart: Ratings per Question
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50  "></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart: Courses Distribution (Students)
                        </div>
                        <div class="card-body"><canvas id="myBarChart02" width="100%" height="50  "></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-pie me-1"></i>
                            Pie Chart: Gender Distribution
                        </div>
                        <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/chart-pie-demo.js"></script>
</body>

</html>