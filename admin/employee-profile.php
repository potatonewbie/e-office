<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/employeeProfile.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Employee Profile</title>
</head>
<body>
    <?php
        include_once("employee-profile-details.php");
        include_once("sidenav.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <div class="employeeProfile d-flex align-items-center">
                <a href="employee-details.php" class="nav-link d-flex pe-4">
                    <i class="fas fa-chevron-left fa-lg"></i>
                </a>
                <h3 class="h3 d-inline-block">Employee Profile</h3>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <div class="details">
                    <table>
                        <tbody>
                    <?php 
                        foreach ($result as $row) { 
                            $empID = $row["empID"];
                    ?>
                            <tr>
                                <th>Employee Number:</th>
                                <td><?php echo $empID; ?></td>
                            </tr>
                            <tr>
                                <th>Employee Name:</th>
                                <td><?php echo $row["empName"]; ?></td>
                            </tr>
                            <tr>
                                <th>Joined Date:</th>
                                <td><?php echo date('d-m-Y', strtotime($row["JoinDate"])); ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?php echo $row["Email"]; ?></td>
                            </tr>
                            <tr>
                                <th>Position:</th>
                                <td><?php echo $row["Position"]; ?></td>
                            </tr>
                            <tr>
                                <th>Annual Leave:</th>
                                <td><?php echo $row["Annual_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Medical Leave:</th>
                                <td><?php echo $row["Medical_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Emergency Leave:</th>
                                <td><?php echo $row["Emergency_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Maternity Leave:</th>
                                <td><?php echo $row["Maternity_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Paternity Leave:</th>
                                <td><?php echo $row["Paternity_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Compassionate Leave:</th>
                                <td><?php echo $row["Compassionate_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Study Leave:</th>
                                <td><?php echo $row["Study_Leave"]; ?></td>
                            </tr>
                            <tr>
                                <th>Examination Leave:</th>
                                <td><?php echo $row["Examination_Leave"]; ?></td>
                            </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-end text-nowrap">
                    <a class="btn btn-success col-sm-3" href="edit-employee.php?empID=<?php echo $empID ?>" role="button">EDIT</a>
                    <!-- Button trigger modal -->
                    <button class="btn btn-danger col-sm-3" id="DeleteDetails" data-bs-toggle="modal" data-bs-target="#EmployeeProfileModal">
                        DELETE
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="EmployeeProfileModal" tabindex="-1" aria-labelledby="EmpProfile" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EmployeeProfileModal">Delete Confirmation</h5>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                        </div>
                        <div class="modal-body">
                            Are you sure to delete this employee profile?
                        </div>
                        <form action="employee-details-delete.php" method="POST">
                            <div class="modal-footer">
                                <input type="hidden" name="empID" value="<?php echo $empID ?>">
                                <button type="button" class="modal_btn btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="deleteEmpDetails" class="modal_btn btn btn-primary">Yes</button>
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