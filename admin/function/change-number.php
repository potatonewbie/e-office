<?php

session_start();

require_once("../../db-connect.php");

if(isset($_POST["save"])) {
    $empNum = checkInput($_POST["empNo"]);
    $pass = $_POST["pass"];
    $conPass = $_POST["conPass"];

    if(empty($empNum)) {
        header("location: ../change-number.php?error=Number is required.");
    }
    else if(empty($pass)) {
        header("location: ../change-number.php?error=Password is required.");
    }
    else if(empty($conPass)) {
        header("location: ../change-number.php?error=Confirm Password is required.");
    }
    else if($empNum > 99999) {
        header("location: ../change-number.php?error=Number is too long.");
    }
    else if(!is_numeric($empNum)) {
        header("location: ../change-number.php?error=Please Enter Numeric Value.");
    }
    else {
        $pass = md5($pass);
        $conPass = md5($conPass);

        $stmt = $db->prepare("SELECT empID, empPassword FROM employee_info WHERE employee_info.UserType = 'admin'");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["empID"] === $empNum) {
            header("location: ../change-number.php?error=New number cannot be same as previous number.");
        }
        else {
            if($result["empPassword"] === $pass) {

                if($pass === $conPass) {

                    $stmt2 = $db->prepare("UPDATE employee_info SET empID = :empID WHERE employee_info.UserType = 'admin'");
                    $stmt2->bindParam(":empID", $empNum, PDO::PARAM_STR);
                    $stmt2->execute();
                    
                    if($stmt2->rowCount() === 0) {
                        header("location: ../change-number.php?error=Number already exists use another number");
                    }
                    else {
                        header("location: ../change-number.php?success=Admin number has been updated successfully.");
                    }
                }
                else {
                    header("location: ../change-number.php?error=Password and confirm password does not match.");
                }
            }
            else {
                header("location: ../change-number.php?fail=Incorrect password.");
            }
        }
    }
}
else {
    header("location: ../change-number.php");
}

/*
Validate Form Data
    1. Strip unnecessary characters (extra space, tab, newline) from the user input data (with the PHP trim() function)
    2. Remove backslashes (\) from the user input data (with the PHP stripslashes() function)
*/
function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>