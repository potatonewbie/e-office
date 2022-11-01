<?php

require("runQuery.php");

function getLeaveBalance() {
    $query = "CALL GET_EMPLOYEE_LEAVE_BALANCE()";
    return runQuery($query);
}

function getLeaveTaken() {
    $query = "CALL GET_EMPLOYEE_LEAVE_TAKEN()";
    return runQuery($query);
}

?>