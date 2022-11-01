<?php

require("runQuery.php");

function getRecentLeaveRequest() {
    $query = "CALL GET_RECENT_PENDING_LEAVE()";
    return runQuery($query);
}

function getRecentLeaveHistory() {
    $query = "CALL GET_RECENT_APPROVED_DECLIEND_LEAVE()";
    return runQuery($query);
}
?>