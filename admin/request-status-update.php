<?php

require("../db-connect.php");

if(isset($_POST['approve']) && isset($_POST['leaveID']) && isset($_POST['empID']) && isset($_POST['dayRequest']) && isset($_POST['leaveType'])) {
    $leaveID = $_POST['leaveID'];
    $empID = $_POST['empID'];
    $dayRequest = $_POST['dayRequest'];
    $leaveType = $_POST['leaveType'];
    $status = "Approved";
    
    // Update leave request status to approve
    $stmt = $db->prepare("CALL REQUEST_STATUS_UPDATE(:leaveID, :status)");
    $stmt->bindParam(':leaveID', $leaveID, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();

    // Update the leave balance and leave taken
    if($leaveType === "Annual Leave") {
        $stmt2 = $db->prepare("UPDATE leave_balance SET Annual_Leave = Annual_Leave - :dayRequest WHERE empID = :empID");
        $stmt2->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt2->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt2->execute();

        $stmt3 = $db->prepare("UPDATE leave_taken SET Annual_Leave = Annual_Leave + :dayRequest WHERE empID = :empID");
        $stmt3->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt3->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt3->execute();
    }
    else if($leaveType === "Medical Leave") {
        $stmt4 = $db->prepare("UPDATE leave_balance SET Medical_Leave = Medical_Leave - :dayRequest WHERE empID = :empID");
        $stmt4->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt4->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt4->execute();

        $stmt5 = $db->prepare("UPDATE leave_taken SET Medical_Leave = Medical_Leave + :dayRequest WHERE empID = :empID");
        $stmt5->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt5->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt5->execute();
    }
    else if($leaveType === "Emergency Leave") {
        $stmt6 = $db->prepare("UPDATE leave_balance SET Emergency_Leave = Emergency_Leave - :dayRequest WHERE empID = :empID");
        $stmt6->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt6->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt6->execute();

        $stmt7 = $db->prepare("UPDATE leave_taken SET Emergency_Leave = Emergency_Leave + :dayRequest WHERE empID = :empID");
        $stmt7->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt7->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt7->execute();
    }
    else if($leaveType === "Maternity Leave") {
        $stmt8 = $db->prepare("UPDATE leave_balance SET Maternity_Leave = Maternity_Leave - :dayRequest WHERE empID = :empID");
        $stmt8->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt8->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt8->execute();

        $stmt9 = $db->prepare("UPDATE leave_taken SET Maternity_Leave = Maternity_Leave + :dayRequest WHERE empID = :empID");
        $stmt9->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt9->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt9->execute();
    }
    else if($leaveType === "Paternity Leave") {
        $stmt10 = $db->prepare("UPDATE leave_balance SET Paternity_Leave = Paternity_Leave - :dayRequest WHERE empID = :empID");
        $stmt10->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt10->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt10->execute();

        $stmt11 = $db->prepare("UPDATE leave_taken SET Paternity_Leave = Paternity_Leave + :dayRequest WHERE empID = :empID");
        $stmt11->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt11->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt11->execute();
    }
    else if($leaveType === "Compassionate Leave") {
        $stmt12 = $db->prepare("UPDATE leave_balance SET Compassionate_Leave = Compassionate_Leave - :dayRequest WHERE empID = :empID");
        $stmt12->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt12->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt12->execute();

        $stmt12 = $db->prepare("UPDATE leave_taken SET Compassionate_Leave = Compassionate_Leave + :dayRequest WHERE empID = :empID");
        $stmt12->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt12->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt12->execute();
    }
    else if($leaveType === "Study Leave") {
        $stmt13 = $db->prepare("UPDATE leave_balance SET Study_Leave = Study_Leave - :dayRequest WHERE empID = :empID");
        $stmt13->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt13->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt13->execute();

        $stmt13 = $db->prepare("UPDATE leave_taken SET Study_Leave = Study_Leave + :dayRequest WHERE empID = :empID");
        $stmt13->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt13->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt13->execute();
    }
    else if($leaveType === "Examination Leave") {
        $stmt14 = $db->prepare("UPDATE leave_balance SET Examination_Leave = Examination_Leave - :dayRequest WHERE empID = :empID");
        $stmt14->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt14->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt14->execute();

        $stmt15 = $db->prepare("UPDATE leave_taken SET Examination_Leave = Examination_Leave + :dayRequest WHERE empID = :empID");
        $stmt15->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt15->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt15->execute();
    }
    else if($leaveType === "Unpaid Leave") {
        $stmt16 = $db->prepare("UPDATE leave_taken SET Unpaid_Leave = Unpaid_Leave + :dayRequest WHERE empID = :empID");
        $stmt16->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt16->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt16->execute();
    }
    else if($leaveType === "Others") {
        $stmt16 = $db->prepare("UPDATE leave_taken SET Others = Others + :dayRequest WHERE empID = :empID");
        $stmt16->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
        $stmt16->bindParam(':empID', $empID, PDO::PARAM_INT);
        $stmt16->execute();
    }

    header("location: pending-request.php");
}

else if (isset($_POST['decline'])) {
    $status = "Declined";
    $leaveID = $_POST['leaveID'];

    $stmt = $db->prepare("CALL REQUEST_STATUS_UPDATE(:leaveID, :status)");
    $stmt->bindParam(':leaveID', $leaveID, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->execute();

    header("location: pending-request.php");
}

?>