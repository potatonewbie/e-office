<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/dashboard.css">
    
    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Admin Dashboard</title>
</head>
<body>
    <?php 
        include_once("sidenav.php"); 
        include_once("function/dashboard.php"); 
    ?>

<div class="container-fluid bg-light">
    <div class="content">
        <h3 class="fw-bold">Dashboard</h3>
        <h5 class="fw-normal mt-3">Recent Leave Requested</h5>
        <div class="card">
            <div class="card-body overflow-auto">
            <?php
                $result = getRecentLeaveRequest(); 

                if(sizeof($result) === 0) {
                    echo "<label>There are no Recent Pending Requests currently.</label>";
                }

                else if($result > 0) {
            ?>
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Leave Type</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Leave Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    
                    foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row["empID"] ?></td>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["leaveType"] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row["startDate"])) ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row["endDate"])) ?></td>
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
        <h5 class="fw-normal mt-5">Recent Leave Histories</h5>
        <div class="card">
            <div class="card-body overflow-auto">
            <?php 
                $result = getRecentLeaveHistory();
                
                if(sizeof($result) === 0) {
                    echo "<label>There are no Recent Approved or Decliend Leave.</label>";
                }

                else if($result > 0) {
            ?>
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Leave Type</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Leave Status</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row["empID"] ?></td>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["leaveType"] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row["startDate"])) ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row["endDate"])) ?></td>
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
</div>
<script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>