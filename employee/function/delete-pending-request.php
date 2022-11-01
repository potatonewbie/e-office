<?php

session_start();

require("../../db-connect.php");

if(!isset($_GET['leaveID']) || empty($_GET['leaveID'])){
    header('location: ../pending-leave.php');
}

else {
    $stmt = $db->prepare("DELETE FROM leave_request WHERE leaveID = :leaveID AND empID = :empID AND leaveStatus = 'Pending'");
    $stmt->bindParam(':leaveID', $_GET['leaveID'], PDO::PARAM_INT);
    $stmt->bindParam(':empID', $_SESSION['eid'], PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() === 1) {
        echo '<script language="javascript" type="text/javascript"> 
                alert("LeaveID '.$_GET['leaveID'].' Deleted");
                window.location = "../pending-leave.php";
              </script>';
    }
    else {
        header('location: ../pending-leave.php');
    }
}

?>