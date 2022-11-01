<?php

require("runQuery.php");

function getPendingRequest() {
    $query = "CALL GET_PENDING_LEAVE()";
    return runQuery($query);
}

?>