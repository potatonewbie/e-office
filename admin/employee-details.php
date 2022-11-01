<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/employeeDetails.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Employee Personal Details</title>
</head>
<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/employee-details.php");

        // Dynamic limit
        $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 7;
        // Current pagination page number
        $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
        // Offset
        $paginationStart = ($page - 1) * $limit;
        // Limit query
        $employees = getLimitEmployee($paginationStart, $limit);

        // Get total records
        $result = getNumberOfEmployee();
        $allRecords = $result[0]['empID'];

        // Calculate total pages
        $totalPages = ceil($allRecords / $limit);

        // Prev + Next
        $prev = $page - 1;
        $next = $page + 1;

    ?>
    
    <div class="container-fluid bg-light">
        <div class="content">
            <div class="employeeDetails d-flex align-items-center">
                <h3 class="me-auto h3 d-inline-block">Employee Personal Details</h3>
                <a class="btn btn-primary" href="add-new-employee.php" role="button"><i class="add fas fa-plus"></i>NEW</a>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
            <?php
                if($employees === 0) {
                    echo "<label>There are no Employee Created.</label>";
                }

                else if($employees > 0) {
            ?>
                <table class="table table-hover p-2">
                    <thead>
                        <tr>
                            <th scope="col">EMPLOYEE NUMBER</th>
                            <th scope="col">EMPLOYEE NAME</th>
                            <th scope="col">DATE JOINED</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">POSITION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($employees as $row) { 
                    ?>
                        <tr data-href="employee-profile.php?empID=<?php echo $row["empID"]?>">
                        <th scope="row"><?php echo $row["empID"] ?></th>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row["JoinDate"])) ?></td>
                            <td><?php echo $row["Email"] ?></td>
                            <td><?php echo $row["Position"] ?></td>
                        </tr>

                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="Pagination mt-2">
                <nav aria-label="Page navigation example mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
                        </li>

                        <?php for($i = 1; $i <= $totalPages; $i++ ): ?>
                            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                <a class="page-link" href="employee-details.php?page=<?= $i; ?>"> <?= $i; ?> </a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?php if($page >= $totalPages) { echo 'disabled'; } ?>">
                            <a class="page-link"
                                href="<?php if($page >= $totalPages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <script>
        $('tr[data-href]').on("click", function() {
            document.location = $(this).data('href');
        });
    </script>
    
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>