<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/editEmp.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Edit Employee Details</title>
</head>

<body>
    <?php
        include_once("sidenav.php");
        include_once("function/edit-employee.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <div class="leaveHistory d-flex align-items-center">
                <a href="employee-profile.php?empID=<?php echo $_GET["empID"]?>" class="nav-link d-flex pe-4">
                    <i class="fas fa-chevron-left fa-lg"></i>
                </a>
                <h3 class="h3 d-inline-block">Edit Employee Details</h3>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
            <?php
                if(sizeof($result) === 0)
                    echo "<label>There are no result.</label>";
                else {
                    foreach ($result as $row) {
                        $empID = $row["empID"];
                        $empName = $row["empName"];
                        $empEmail =$row["Email"];
                        $date = date("Y-m-d", strtotime($row["JoinDate"]));
                        $position = $row["Position"];
                        $annual = $row["Annual_Leave"];
                        $medical = $row["Medical_Leave"];
                        $emergency = $row["Emergency_Leave"];
                        $maternity = $row["Maternity_Leave"];
                        $paternity = $row["Paternity_Leave"];
                        $compassionate = $row["Compassionate_Leave"];
                        $study = $row["Study_Leave"];
                        $exam = $row["Examination_Leave"];
                    }
            ?>
                <form action="employee-details-edit.php" method="POST">
                <div class="input-form">
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="joined_date_input" type="date" name="joinDate"
                                    class="form-control" placeholder="Joined Date" value="<?php echo $date ?>" required>
                                <label for="joined_date_input">Joined Date (MM/DD/YYYY)</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emp_no_input" type="text" name="empID" 
                                    class="form-control" placeholder="empNo" value="<?php echo $empID ?>" readonly>
                                <label for="emp_no_input">Employee Number</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emp_name_input" type="text" name="empName"
                                    class="form-control" placeholder="empName" value="<?php echo $empName ?>" required>
                                <label for="emp_name_input">Employee Name</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="email_input" type="text" name="email"
                                    class="form-control" placeholder="email" value="<?php echo $empEmail ?>" required>
                                <label for="email_input">Email</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="position_input" type="text" name="position"
                                    class="form-control" placeholder="Position" value="<?php echo $position ?>" required>
                                <label for="position_input">Position</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="annual_input" type="text" name="annual" 
                                    class="form-control" placeholder="annual" value="<?php echo $annual ?>" required>
                                <label for="annual_input">Annual Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="medical_input" type="text" name="medical" 
                                    class="form-control" placeholder="medical" value="<?php echo $medical ?>" required>
                                <label for="medical_input">Medical Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emergency_input" type="text" name="emergency" 
                                    class="form-control" placeholder="emergency" value="<?php echo $emergency ?>" required>
                                <label for="emergency_input">Emergency Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="maternity_input" type="text" name="maternity" 
                                    class="form-control" placeholder="maternity" value="<?php echo $maternity ?>" required>
                                <label for="maternity_input">Maternity Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="paternity_input" type="text" name="paternity" 
                                    class="form-control" placeholder="paternity" value="<?php echo $paternity ?>" required>
                                <label for="paternity_input">Paternity Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="compassionate_input" type="text" name="compassionate" 
                                    class="form-control" placeholder="compassionate" value="<?php echo $compassionate ?>" required>
                                <label for="compassionate_input">Compassionate Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="study_input" type="text" name="study" 
                                    class="form-control" placeholder="study" value="<?php echo $study ?>">
                                <label for="study_input">Study Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="exam_input" type="text" name="exam" 
                                    class="form-control" placeholder="exam" value="<?php echo $exam ?>">
                                <label for="exam_input">Examination Leave Entitlement</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="editEmpDetails" class="btn btn-success col-sm-3"
                            id="EditEmp">EDIT</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            <?php
                }
            ?>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/navigation.js"></script>    
</body>
</html>