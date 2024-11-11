<?php

include "config/config.php"; 

// Query to fetch staff data from the 'staff' table
$query = "SELECT * FROM staff";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Staff List</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include "modules/navigation-panel.php"; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Staff List</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Staff List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                            .
                        </div>
                    </div>

                    <!-- Staff Table -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Staff Information
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple" class="table table-striped table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Type</th>
                                                    <th>Email</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                    $counter = 1;  
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $counter . "</td>";
                                                        echo "<td>" . $row['S_Name'] . "</td>";  
                                                        echo "<td>" . $row['S_Type'] . "</td>";  
                                                        echo "<td>" . $row['S_Email'] . "</td>"; 
                                                        echo "<td><a href='edit-staff.php?id=" . $row['Staff_ID'] . "' class='btn btn-primary btn-sm'>Edit</a> <a href='delete-staff.php?id=" . $row['Staff_ID'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";
                                                        echo "</tr>";
                                                        $counter++;
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5' class='text-center'>No staff found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyfROm+jR12G8z+9coH/sRzDX9n5g/vjcbzDGM0G" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb6BJiD6RYhiu1I1i5vYcwyJ5/hB5Y5J30BpeJqS5Fj9J9kj5" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>       
        <script src="js/scripts.js"></script>    
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0A1qlV3zV9fAkhbsN+Tj8z5lZsU1IQ8lJzkhhALfYlZq2dyK" crossorigin="anonymous"></script>
    </body>
</html>
