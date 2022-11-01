<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/leaveHistory.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Leave History</title>
</head>

<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/leave-history.php");

        $result = getAllLeaveHistory();
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <div class="leaveHistory d-flex align-items-center">
                <h3 class="me-auto d-inline-block">Leave History</h3>
            </div>
            <div class="d-flex align-items-center">
                <form action="leave-history.php" method="POST">
                <div>
                    <label>From:</label>
                    <input type="month" name="startDate" required>
                    <label>To</label>
                    <input type="month" name="endDate" required>
                    <button type="submit" name="dateFilter" class="filter btn btn-primary">Filter</button>
                </div>
                </form>
                <form class="ms-auto" action="generate-report.php" method="POST">
                <?php
                    if(sizeof($result) === 0) { ?>
                        <button type="submit" class="generateReportButton btn btn-primary" disabled>Generate Report</button>
                <?php 
                    } 
                    else {
                ?>
                        <input type="hidden" name="data" value="<?php echo htmlspecialchars(serialize($result)) ?>">
                        <button type="submit" name="export" class="generateReportButton btn btn-primary">Generate Report</button>
                <?php
                    }
                ?>
                </form>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
            <?php
                if(sizeof($result) === 0) {
                    echo "<label>There are no Aprrove or Decline leave.</label>";
                }

                else if ($result > 0) {
            ?>
                <table class="table table-hover p-2">
                    <thead>
                        <tr>
                            <th scope="col">Employee ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Day Requested</th>
                            <th scope="col">Leave Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($result as $row) {
                        ?>
                            <tr data-href="history-details.php?leaveID=<?php echo $row['leaveID'] ?>">
                                <th scope="row"><?php echo $row["empID"] ?></th>
                                <td><?php echo $row["empName"] ?></td>
                                <td><?php echo $row["leaveType"] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row["startDate"])) ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row["endDate"])) ?></td>
                                <td><?php echo $row["Days"] ?></td>
                                <td><?php echo $row["leaveStatus"] ?></td>
                            </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
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