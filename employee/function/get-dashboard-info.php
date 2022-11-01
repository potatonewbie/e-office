<?php

function getAllLeaveBalance() {
    require("../db-connect.php");
    $stmt = $db->prepare("SELECT * FROM leave_balance WHERE empID = :eid");
    $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getAllLeaveTaken() {
    require("../db-connect.php");
    $stmt = $db->prepare("SELECT * FROM leave_taken WHERE empID = :eid");
    $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>