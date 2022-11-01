<?php

require("../db-connect.php");

if(isset($_POST['editEmpDetails']) && isset($_POST['joinDate']) && isset($_POST['empName']) && isset($_POST['email']) && isset($_POST['position']) 
    && isset($_POST['annual']) && isset($_POST['medical']) && isset($_POST['emergency']) && isset($_POST['maternity']) 
    && isset($_POST['paternity']) && isset($_POST['compassionate']) && isset($_POST['study']) && isset($_POST['exam'])) {
        
        $date = date('Y-m-d', strtotime($_POST['joinDate']));

        $stmt1 = $db->prepare("CALL UPDATE_EMPLOYEE_INFO(?, ?, ?, ?, ?)");
        $stmt1->execute(array($_POST['empID'], $date, $_POST['empName'], $_POST['email'], $_POST['position']));
        
        $stmt2 = $db->prepare("CALL UPDATE_EMPLOYEE_LEAVE_ENTITLEMENT(?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt2->execute(array($_POST['empID'], $_POST['annual'], $_POST['medical'], $_POST['emergency'], $_POST['maternity'], 
                                $_POST['paternity'], $_POST['compassionate'], $_POST['study'], $_POST['exam']));

        echo '<script language="javascript" type="text/javascript"> 
                alert("Employee Details Updated");
                window.location = "employee-details.php";
              </script>';
}

?>