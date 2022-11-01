<?php

require("runQuery.php");

function getAllLeaveHistory() {
    if(!isset($_POST['dateFilter']) || (empty($_POST['startDate']) && empty($_POST['endDate']))) {
        $query = "CALL GET_APPROVED_AND_DECLINED_LEAVE()";
        return runQuery($query);
    }

    else if(isset($_POST['dateFilter'])) {
        require("../db-connect.php");
        $startDate = date('Y-m-d', strtotime($_POST['startDate'] . "-01"));
        $endDate = date('Y-m-d', strtotime($_POST['endDate'] . "-01"));

        $stmt = $db->prepare("CALL GET_APPROVED_AND_DECLINED_LEAVE_FILTER_BY_DATE(:startDate, :endDate)");
        $stmt->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

function getLeaveHistoryDetails() {
    require("../db-connect.php");

    $stmt = $db->prepare("CALL GET_LEAVE_DETAILS(:leaveID)");
    $stmt->bindParam(':leaveID', $_GET['leaveID'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}


?>