<?php

// Get employee ongoing pending leave
function getPendingLeave() {
    require("../db-connect.php");
    
    $stmt = $db->prepare("SELECT leaveID, startDate, endDate, leaveType, leaveStatus, `description` FROM leave_request 
                            WHERE empID = :eid AND leaveStatus = 'Pending'");
    $stmt->bindParam(':eid', $_SESSION['eid'], PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>