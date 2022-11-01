<?php

//error_reporting(0);

// This function only use for MySQL SELECT STATEMENT WITHOUT PARAMETER
function runQuery($query) {
    require("../db-connect.php");
    $stmt = $db->prepare($query);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $result;
}
?>
