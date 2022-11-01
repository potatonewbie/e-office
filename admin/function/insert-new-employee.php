<?php

require('../../db-connect.php');

if(isset($_POST['addEmployee']) && isset($_POST['empID']) && isset($_POST['joinDate']) && isset($_POST['empName']) && isset($_POST['email']) && isset($_POST['position']) 
    && isset($_POST['annual']) && isset($_POST['medical']) && isset($_POST['emergency']) && isset($_POST['maternity']) 
    && isset($_POST['paternity']) && isset($_POST['compassionate']) && isset($_POST['study']) && isset($_POST['exam'])) {
    
    $empID = $_POST['empID'];
    $pass = "LLAS".$empID;
    $md5pass = md5($pass);

    $date = date('Y-m-d', strtotime($_POST['joinDate']));

    $stmt1 = $db->prepare("CALL INSERT_EMPLOYEE_INFO(?, ?, ?, ?, ?, ?)");
    $stmt1->execute(array($_POST['empID'], $_POST['empName'], $_POST['email'], $date, $md5pass, $_POST['position']));

    $stmt2 = $db->prepare("CALL INSERT_EMPLOYEE_LEAVE_ENTITLEMENT(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt2->execute(array($_POST['empID'], $_POST['annual'], $_POST['medical'], $_POST['emergency'], $_POST['maternity'], 
                $_POST['paternity'], $_POST['compassionate'], $_POST['study'], $_POST['exam']));
    
    $stmt3 = $db->prepare("CALL INSERT_EMPLOYEE_LEAVE_BALANCE(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt3->execute(array($_POST['empID'], $_POST['annual'], $_POST['medical'], $_POST['emergency'], $_POST['maternity'], 
                $_POST['paternity'], $_POST['compassionate'], $_POST['study'], $_POST['exam']));

    $stmt4 = $db->prepare("INSERT INTO leave_taken(empID) VALUES (:eid)");
    $stmt4->bindParam(':eid', $_POST['empID'], PDO::PARAM_INT);
    $stmt4->execute();
    
    if($stmt1->rowCount() > 0 && $stmt2->rowCount() > 0 && $stmt3->rowCount() > 0 && $stmt4->rowCount() > 0) {
            echo '<script language="javascript" type="text/javascript"> 
                    alert("Employee Added!");
                    window.location = "../employee-details.php";
                  </script>';
    }
    else {
        echo '<script language="javascript" type="text/javascript"> 
                alert("Employee Add Failed! Check If Employee Number Exists");
                window.location = "../employee-details.php";
              </script>';
    }
}

?>