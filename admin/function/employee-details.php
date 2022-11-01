<?php

require("runQuery.php");

function getEmployeeID() {
    require('../db-connect.php');
    $stmt = $db->prepare("SELECT MAX(empID) as empID FROM employee_info WHERE UserType != 'admin'");
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $empID = $row['empID'];
    }

    return $empID;
}

function getNumberOfEmployee() {
    $query = "SELECT COUNT(empID) AS empID FROM employee_info WHERE UserType != 'admin'";
    return runQuery($query);
}

function getLimitEmployee($pageStart, $limit) {
    require('../db-connect.php');
    $stmt = $db->prepare("CALL GET_EMPLOYEE_DETAILS_LIMIT(:start, :limit)");
    $stmt->bindParam(':start', $pageStart, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

?>