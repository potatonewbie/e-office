<?php

require("../db-connect.php");

if(!isset($_GET['empID']) || empty($_GET['empID'])){
    header('location: employee-details.php');
}

else if(isset($_GET['empID'])) {
    $empID = $_GET['empID'];

    $stmt = $db->prepare("CALL GET_EMPLOYEE_PERSONAL_DETAILS(:empID)");
    $stmt->bindParam(':empID', $empID, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($result) === 0)
        header('location: employee-details.php');
}

?>