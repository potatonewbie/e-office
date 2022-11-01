<?php

require("../db-connect.php");

if(isset($_POST['deleteHistoryDetail'])) {
    $stmt = $db->prepare("DELETE FROM leave_request WHERE leaveID = :leaveID AND (leaveStatus = 'Approved' OR leaveStatus = 'Declined')");
    $stmt->bindParam(':leaveID', $_POST['leaveID'], PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        echo '<script language="javascript" type="text/javascript"> 
                alert("Leave Details Successfully Deleted");
                window.location = "leave-history.php";
                </script>';
    }
}

?>