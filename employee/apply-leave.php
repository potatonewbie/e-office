<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/employee/applyLeave.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['eid'])) {
            header("location: ../index.php");
        }
    ?>
    <title>Apply Leave</title>
</head>
<body>
    <?php 
        include_once("sidenav.php"); 
        include_once("../db-connect.php");
        $stmt = $db->prepare("SELECT * FROM leave_balance WHERE empID = :eid");
        $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_GET['date'])) {
            $startDate = new DateTime($_GET['date']);
            $applyDate = new DateTime(date('Y-m-d'));

            $interval = date_diff($applyDate, $startDate);
            $interval = $interval->format('%a');
        }
    ?>
    
    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Apply Leave</h3>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <form action="function/apply-leave.php" method="POST">
                    <div class="input-form">
                    <?php 
                        if (isset($_GET['success'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-success col-8" role="alert">
                                    <?=$_GET['success']?>
                                </div>
                            </div>
                        <?php 
                        }
                        else if (isset($_GET['error'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-warning col-8" role="alert">
                                    <?=$_GET['error']?>
                                </div>
                            </div>
                        <?php
                        }
                        else if (isset($_GET['fail'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-danger col-8" role="alert">
                                    <?=$_GET['fail']?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 ">
                                <input id="emp_num_input" type="text" name="empNo" class="form-control" value="<?php echo $_SESSION['eid']?>" readonly>
                                <label for="emp_num_input">Employee Number</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-3 mt-3">
                                <input id="date_input" type="date" name="start-date" class="form-control" 
                                    placeholder="date" value="<?php if(isset($_GET['date'])) { echo $_GET['date'];}  ?>" onchange="reload()">
                                <label for="date_input">Start Date</label>
                            </div>
                            <p class="text-to align-self-center text-center col-2 mt-3">TO</p>
                            <div class="form-floating col-3 mt-3">
                                <input id="date_input" type="date" name="end-date" class="form-control" placeholder="date">
                                <label for="date_input">End Date</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <select name="leave-type" class="form-select" aria-label="Leave Type">
                                    <option selected>-</option>
                                    <?php
                                        if($interval <= 3) {
                                            if($result[0]['Emergency_Leave'] <= 0) {
                                                echo "<option value='Emergency Leave' disabled>Emergency Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Emergency Leave'>Emergency Leave</option>";
                                            }
                                            if($result[0]['Compassionate_Leave'] <= 0) {
                                                echo "<option value='Compassionate Leave' disabled>Compassionate Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Compassionate Leave'>Compassionate Leave</option>";
                                            }
                                        }
                                        else {
                                            if($result[0]['Annual_Leave'] <= 0) {
                                                echo "<option value='Annual Leave' disabled>Annual Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Annual Leave'>Annual Leave</option>";
                                            }

                                            if($result[0]['Medical_Leave'] <= 0) {
                                                echo "<option value='Medical Leave' disabled>Medical Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Medical Leave'>Medical Leave</option>";
                                            }

                                            if($result[0]['Emergency_Leave'] <= 0) {
                                                echo "<option value='Emergency Leave' disabled>Emergency Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Emergency Leave'>Emergency Leave</option>";
                                            }

                                            if($result[0]['Maternity_Leave'] <= 0) {
                                                echo "<option value='Maternity Leave' disabled>Maternity Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Maternity Leave'>Maternity Leave</option>";
                                            }

                                            if($result[0]['Paternity_Leave'] <= 0) {
                                                echo "<option value='Paternity Leave' disabled>Paternity Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Paternity Leave'>Paternity Leave</option>";
                                            }

                                            if($result[0]['Compassionate_Leave'] <= 0) {
                                                echo "<option value='Compassionate Leave' disabled>Compassionate Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Compassionate Leave'>Compassionate Leave</option>";
                                            }

                                            if($result[0]['Study_Leave'] <= 0) {
                                                echo "<option value='Study Leave' disabled>Study Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Study Leave'>Study Leave</option>";
                                            }

                                            if($result[0]['Examination_Leave'] <= 0) {
                                                echo "<option value='Examination Leave' disabled>Examination Leave</option>";
                                            }
                                            else {
                                                echo "<option value='Examination Leave'>Examination Leave</option>";
                                            }
                                        }
                                    ?>
                                    <option value='Unpaid Leave'>Unpaid Leave</option>
                                    <option value='Others'>Others</option>
                                </select>
                                <label for="leaveType">Leave Type</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <textarea name="leave-reason" class="form-control" placeholder="leaveReason" id="leaveReason" style="height: 100px"></textarea>
                                <label for="leaveReason">Leave Reason</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="submit" class="btn btn-success col-sm-3"
                            id="ApplyRequest">SUBMIT</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function reload()
        {
            let date = document.getElementsByName("start-date")[0].value;
            self.location='apply-leave.php?date=' + date;
        }
    </script>
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>
