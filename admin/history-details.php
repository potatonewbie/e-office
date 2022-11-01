<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/historyDetails.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Leave History Details</title>
</head>
<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/leave-history.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <div class="historyDetails d-flex align-items-center">
                <a href="leave-history.php" class="nav-link d-flex pe-4">
                    <i class="fas fa-chevron-left fa-lg"></i>
                </a>
                <h3 class="h3 d-inline-block">Leave History Details</h3>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <div class="details">
                <?php
                    if(!isset($_GET['leaveID']) || empty($_GET['leaveID'])){
                        echo "<label>The leaveID is empty</label>";
                    }
                    
                    else {
                        $result = getLeaveHistoryDetails();
                        
                        if(sizeof($result) === 0) {
                            echo "There is no leave details";
                        }

                        foreach($result as $row) {
                            $leaveID = $row['leaveID'];
                ?>
                    <table>
                        <tbody>
                            <tr>
                                <th>Employee Number:</th>
                                <td><?php echo $row['empID'] ?></td>
                            </tr>
                            <tr>
                                <th>Employee Name:</th>
                                <td><?php echo $row['empName'] ?></td>
                            </tr>
                            <tr>
                                <th>Date Start:</th>
                                <td><?php echo date('d-m-Y', strtotime($row['startDate'])) ?></td>
                            </tr>
                            <tr>
                                <th>Date End:</th>
                                <td><?php echo date('d-m-Y', strtotime($row['endDate'])) ?></td>
                            </tr>
                            <tr>
                                <th>Total Days:</th>
                                <td><?php echo $row['Days'] ?></td>
                            </tr>
                            <tr>
                                <th>Leave Type:</th>
                                <td><?php echo $row['leaveType'] ?></td>
                            </tr>
                            <tr>
                                <th>Leave Status:</th>
                                <td><?php echo $row['leaveStatus'] ?></td>
                            </tr>
                            <tr>
                                <th>Leave Reason:</th>
                                <td><?php echo $row['description'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-end text-nowrap mt-5">
                    <!-- Button trigger modal -->
                    <button class="btn btn-danger col-sm-3" id="DeleteDetails" data-bs-toggle="modal" data-bs-target="#HistoryDetailsModal">
                        DELETE
                    </button>
                </div>
                <?php
                        }
                    }
                ?>

                <!-- Modal -->
                <div class="modal fade" id="HistoryDetailsModal" tabindex="-1" aria-labelledby="HistoryDetails" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="HistoryDetailsModal">Delete Confirmation</h5>
                        </div>
                        <div class="modal-body">
                            Are you sure to delete this leave history details?
                        </div>
                        <form action="history-details-delete.php" method="POST">
                            <div class="modal-footer">
                                <input type="hidden" name="leaveID" value="<?php echo $leaveID ?>">
                                <button type="button" class="modal_btn btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="deleteHistoryDetail" class="modal_btn btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/navigation.js"></script>
    <script type="text/javascript" src="../js/modal.js"></script>
</body>
</html>