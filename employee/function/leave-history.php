<?php

function getEmployeeLeaveHistory() {
    require("../db-connect.php");

    if(!isset($_POST['dateFilter']) || (empty($_POST['startDate']) && empty($_POST['endDate']))) {
        $stmt = $db->prepare("SELECT leaveType, dateApplied, startDate, endDate, leaveStatus, `description` FROM leave_request 
                                WHERE empID = :empID AND (leaveStatus = 'Approved' OR leaveStatus = 'Declined')");
        $stmt->bindParam(':empID', $_SESSION['eid'], PDO::PARAM_INT);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    else if(isset($_POST['dateFilter'])) {
        $startDate = date('Y-m-d', strtotime($_POST['startDate'] . "-01"));
        $endDate = date('Y-m-d', strtotime($_POST['endDate'] . "-01"));

        $stmt = $db->prepare("CALL GET_EMPLOYEE_FILTER_BY_DATE_LEAVE(:eid, :startDate, :endDate)");
        $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>