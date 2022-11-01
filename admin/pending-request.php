<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/pendingRequest.css">

    <?php 
        include_once("../head.php");
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>
    <title>Pending Request</title>
</head>

<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/pending-request.php")
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Pending Request</h3>
            <div class="requestList bg-white">
            <?php
                $result = getPendingRequest();
                
                if(sizeof($result) === 0) {
                    echo "<label class='mt-2'>There are no Pending Requests currently.</label>";
                }
                else {
                    foreach ($result as $row) {
            ?>

                <div class="card py-3 px-4 overflow-auto">
                    <h5><?php echo $row["empName"] ?></h5>
                    <div>
                        <table class="table1">
                            <tbody>
                            <tr>
                                <th>Apply On:</th>
                                <td><?php echo date('d-m-Y', strtotime($row["dateApplied"])) ?></td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td><?php echo date('d-m-Y', strtotime($row["startDate"])) ?></td>
                            </tr>
                            <tr>
                                <th>End Date:</th>
                                <td><?php echo date('d-m-Y', strtotime($row["endDate"])) ?></td>
                            </tr>
                            <tr>
                                <th>Leave Type:</th>
                                <td><?php echo $row["leaveType"] ?></td>
                            </tr>
                            <tr>
                                <th>Leave Status:</th>
                                <td><?php echo $row["leaveStatus"] ?></td>
                            </tr>
                            <tr>
                                <th>Leave Reason:</th>
                                <td><?php echo $row["description"] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end text-nowrap">
                    <form action="request-status-update.php" method="POST">
                        <input type="hidden" name="leaveID" value="<?php echo $row['leaveID'] ?>">
                        <input type="hidden" name="empID" value="<?php echo $row['empID'] ?>">
                        <input type="hidden" name="dayRequest" value="<?php echo $row['dayRequest'] ?>">
                        <input type="hidden" name="leaveType" value="<?php echo $row['leaveType'] ?>">
                        <button type="submit" name="approve" class="btn btn-success col-sm-3"
                            id="ApproveRequest">APPROVE</button>
                        <button type="submit" name="decline" class="btn btn-danger col-sm-3"
                            id="DeclineRequest">DECLINE</button>
                    </form>
                    </div>
                </div>
            <?php
                    } 
                }
            ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>

</html>