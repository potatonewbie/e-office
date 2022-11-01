<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/employee/leaveHistory.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['eid']))
            header("location: ../index.php");
    ?>

    <title>Leave History</title>
</head>
<body>
    <?php
        include_once("sidenav.php");
        include_once("function/leave-history.php");
    ?>
    
    <div class="container-fluid bg-light">
        <div class="content">
            <div class="d-flex align-items-center">
                <h3 class="me-auto d-inline-block">Leave History</h3>
            </div>
            <form class="d-inline-block" action="leave-history.php" method="POST">
                <label>From:</label>
                <input type="month" name="startDate" required>
                <label>To</label>
                <input type="month" name="endDate" required>
                <button type="submit" name="dateFilter" class="btn btn-primary">Filter</button>
            </form>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <div>
                    <table class="table1">
                        <tbody>
                            <tr>
                                <th>Employee Number:</th>
                                <td><?php echo $_SESSION['eid'] ?></td>
                            </tr>
                            <tr>
                                <th>Employee Name:</th>
                                <td><?php echo $_SESSION['empName'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php 
                    $result = getEmployeeLeaveHistory();

                    if(sizeof($result) === 0) {
                        echo "<label>There are no result</label>";
                    }
                    else if(sizeof($result) > 0) {
                ?>
                <table class="table table2 p-2 mt-4">
                    <thead>
                        <tr>
                            <th scope="col">LEAVE TYPE</th>
                            <th scope="col">APPLY DATE</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">END DATE</th>
                            <th scope="col">LEAVE STATUS</th>
                            <th scope="col">LEAVE REASON</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                        foreach ($result as $row) {
                ?>
                        <tr>
                            <td><?php echo $row['leaveType'] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['dateApplied'])) ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['startDate'])) ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['endDate'])) ?></td>
                            <td><?php echo $row['leaveStatus'] ?></td>
                            <td><?php echo $row['description'] ?></td>
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
    
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>