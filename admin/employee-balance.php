<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/employeeEntitlement.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Employee Leave Entitlement</title>
</head>
<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/employee-balance.php");
        $result = getLeaveBalance();
        $result2 = getLeaveTaken();
    ?>
    
    <div class="container-fluid bg-light">
        <div class="content">
            <div class="leaveEntitlement d-flex align-items-center">
                <h3 class="me-auto d-inline-block">Employee Leave Balance</h3>
                <form class="ms-auto" action="generate-leave-taken-report.php" method="POST">
                    <?php
                        if(sizeof($result2) === 0) { ?>
                            <button type="submit" class="generateReportButton btn btn-primary" disabled>Generate Report</button>
                    <?php 
                        } 
                        else {
                    ?>
                            <input type="hidden" name="data" value="<?php echo htmlspecialchars(serialize($result2)) ?>">
                            <button type="submit" name="export" class="generateReportButton btn btn-primary">Generate Report</button>
                    <?php
                        }
                    ?>
                </form>
            </div>
            <h5 class="fw-normal mt-3">Leave Balance</h5>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
            <?php
                if(sizeof($result) === 0) {
                    echo "<label>There are no employee leave balance.</label>";
                }
                else if ($result > 0) {
            ?>
                <table class="table p-2">
                    <thead>
                        <tr>
                            <th scope="col">EMPLOYEE ID</th>
                            <th scope="col">EMPLOYEE NAME</th>
                            <th scope="col">ANNUAL</th>
                            <th scope="col">MEDICAL</th>
                            <th scope="col">EMERGENCY</th>
                            <th scope="col">MATERNITY</th>
                            <th scope="col">PATERNITY</th>
                            <th scope="col">COMPASSIONATE</th>
                            <th scope="col">STUDY</th>
                            <th scope="col">EXAMINATION</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($result as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row["empID"] ?></td>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["Annual_Leave"] ?></td>
                            <td><?php echo $row["Medical_Leave"] ?></td>
                            <td><?php echo $row["Emergency_Leave"] ?></td>
                            <td><?php echo $row["Maternity_Leave"] ?></td>
                            <td><?php echo $row["Paternity_Leave"] ?></td>
                            <td><?php echo $row["Compassionate_Leave"] ?></td>
                            <td><?php echo $row["Study_Leave"] ?></td>
                            <td><?php echo $row["Examination_Leave"] ?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <h5 class="fw-normal mt-3">Leave Taken</h5>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
            <?php
                if(sizeof($result2) === 0) {
                    echo "<label>There are no employee leave taken.</label>";
                }
                else if ($result2 > 0) {
            ?>
                <table class="table p-2">
                    <thead>
                        <tr>
                            <th scope="col">EMPLOYEE ID</th>
                            <th scope="col">EMPLOYEE NAME</th>
                            <th scope="col">ANNUAL</th>
                            <th scope="col">MEDICAL</th>
                            <th scope="col">EMERGENCY</th>
                            <th scope="col">MATERNITY</th>
                            <th scope="col">PATERNITY</th>
                            <th scope="col">COMPASSIONATE</th>
                            <th scope="col">STUDY</th>
                            <th scope="col">EXAMINATION</th>
                            <th scope="col">UNPAID</th>
                            <th scope="col">OTHERS</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($result2 as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row["empID"] ?></td>
                            <td><?php echo $row["empName"] ?></td>
                            <td><?php echo $row["Annual_Leave"] ?></td>
                            <td><?php echo $row["Medical_Leave"] ?></td>
                            <td><?php echo $row["Emergency_Leave"] ?></td>
                            <td><?php echo $row["Maternity_Leave"] ?></td>
                            <td><?php echo $row["Paternity_Leave"] ?></td>
                            <td><?php echo $row["Compassionate_Leave"] ?></td>
                            <td><?php echo $row["Study_Leave"] ?></td>
                            <td><?php echo $row["Examination_Leave"] ?></td>
                            <td><?php echo $row["Unpaid_Leave"] ?></td>
                            <td><?php echo $row["Others"] ?></td>
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