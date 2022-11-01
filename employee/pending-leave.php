<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/employee/pendingLeave.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['eid']))
            header("location: ../index.php");
    ?>

    <title>Pending Leave</title>
</head>
<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/pending-leave.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Pending Leave</h3>
            <div class="card mt-3">
                <div class="card-body overflow-auto">
                <?php
                    $result = getPendingLeave();

                    if(sizeof($result) === 0) {
                        echo "<label>There are Pending Request.</label>";
                    }

                    else if ($result > 0) {
                ?>
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">LEAVE ID</th>
                                <th scope="col">START DATE</th>
                                <th scope="col">END DATE</th>
                                <th scope="col">LEAVE TYPE</th>
                                <th scope="col">LEAVE STATUS</th>
                                <th scope="col">LEAVE REASON</th>
                                <th scope="col" class="actions">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($result as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row['leaveID']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['startDate'])) ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['endDate'])) ?></td>
                                <td><?php echo $row['leaveType'] ?></td>
                                <td><?php echo $row['leaveStatus'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td>
                                    <a class="btn btn-cancel align-items-center" data-bs-toggle="modal" 
                                        href="function/delete-pending-request.php?leaveID=<?php echo $row['leaveID'] ?>" data-bs-target="#CancelLeaveModal">
                                        <i class="fas fa-times-circle fa-lg"></i>
                                    </a>
                                </td>
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

        <!-- Modal -->
        <div class="modal fade" id="CancelLeaveModal" tabindex="-1" aria-labelledby="Cancel Leave" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CancelLeaveModal">Cancel Confirmation</h5>
            </div>
            <div class="modal-body">
                Are you sure to cancel this pending leave?
            </div>
            <div class="modal-footer">
                <button type="button" class="modal_btn btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a class="modal_btn btn btn-primary" href="#" role="button">Yes</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../js/navigation.js"></script>
    <script type="text/javascript" src="../js/modal.js"></script>
    <script>
        $(document).on("click", ".btn", function() {
            let deleteUrl = $(this).attr('href');
            $(".modal-footer .modal_btn").attr('href', deleteUrl);
            //return false;
        });
    </script>
</body>
</html>