<?php

session_start();

require("../../db-connect.php");

if(isset($_POST["submit"])) {
    $empNum = ($_SESSION["eid"]);
    $startDate = ($_POST["start-date"]);
    $endDate = ($_POST["end-date"]);
    $leaveType = ($_POST["leave-type"]);
    $leaveReason = ($_POST["leave-reason"]);

    $stmt = $db->prepare("SELECT * FROM leave_balance WHERE empID = :eid");
    $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($empNum) || empty($startDate) || empty($endDate) || empty($leaveReason)) {
        header("location: ../apply-leave.php?error=All input fields in required to fill up.");
    }
    else if($leaveType == "-") {
        header("location: ../apply-leave.php?error=Please choose one leave type.");
    }
    else {

        if($_SESSION["eid"] === $empNum) {

            // If starting date is ahead of ending date then error
            if($startDate > $endDate)
                header("location: ../apply-leave.php?error=Start Date is ahead of End Date");
            
            else {
                $start = strtotime($startDate);
                $end = strtotime($endDate);
                $datediff = $end - $start;
                $datediff = round($datediff / (60 * 60 * 24) + 1);
                $applyDate = date('Y-m-d');
                $status = "Pending";

                if($leaveType == 'Annual Leave' && ($result[0]['Annual_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Medical Leave' && ($result[0]['Medical_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Emergency Leave' && ($result[0]['Emergency_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Maternity Leave' && ($result[0]['Maternity_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Paternity Leave' && ($result[0]['Paternity_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Compassionate Leave' && ($result[0]['Compassionate_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Study Leave' && ($result[0]['Study_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else if($leaveType == 'Examination Leave' && ($result[0]['Examination_Leave'] - $datediff) < 0) {
                    header("location: ../apply-leave.php?error=Your Leave Balance Is Insufficient");
                }
                else {
                    $stmt = $db->prepare("INSERT INTO leave_request (empID, leaveType, startDate, endDate, dayRequest, dateApplied, `description`, leaveStatus)
                                            VALUES (:emp_ID, :leave_type, :startDate, :endDate, :day_request, :date_apply, :descriptions, :leave_status)");

                    $stmt->execute([
                        'emp_ID' => $empNum,
                        'leave_type' => $leaveType,
                        'startDate' => $startDate,
                        'endDate' => $endDate,
                        'day_request' => $datediff,
                        'date_apply' => $applyDate,
                        'descriptions' => $leaveReason,
                        'leave_status' => $status
                    ]);
                        
                    // Send Mail After apply a leave
                    include('send-mail.php');

                    header("location: ../apply-leave.php?success=Leave has been submitted successfully.");
                }
            }
        }
        else {
            header("location: ../apply-leave.php?fail=Incorrect employee number. Leave has not been submitted.");
        }
    }

}