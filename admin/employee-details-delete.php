<?php

require("../db-connect.php");

if(isset($_POST['deleteEmpDetails'])) {
    $stmt = $db->prepare("DELETE FROM employee_info WHERE empID = :empID");
    $stmt->bindParam(':empID', $_POST['empID'], PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
        echo '<script language="javascript" type="text/javascript"> 
                alert("Employee Details Successfully Deleted");
                window.location = "employee-details.php";
                </script>';
    }
}

?>