<?php

session_start();

require_once("../../db-connect.php");

if(isset($_POST["save"])) {
    $oPass = checkInput($_POST["oldPass"]);
    $nPass = checkInput($_POST["newPass"]);
    $cnPass = checkInput($_POST["conNewPass"]);

    if (empty($oPass)) {
        header("location: ../change-password.php?error=Current Password is required.");
    }
    else if (empty($nPass)) {
        header("location: ../change-password.php?error=New Password is required.");
    }
    else if (empty($cnPass)) {
        header("location: ../change-password.php?error=Confirm New Password is required.");
    }
    else {
        $oPass = md5($oPass);
        $nPass = md5($nPass);
        $cnPass = md5($cnPass);

        $stmt = $db->prepare("SELECT empID, empPassword FROM employee_info WHERE employee_info.empID = :eid");
        $stmt->bindParam(":eid", $_SESSION["eid"], PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["empID"] === $_SESSION["eid"]) {

            if($result["empPassword"] === $oPass) {

                if($nPass === $cnPass) {

                    $stmt = $db->prepare("UPDATE employee_info SET empPassword = :pwd WHERE empID = :eid");
                    $stmt->bindParam(':eid', $_SESSION["eid"], PDO::PARAM_INT);
                    $stmt->bindParam(':pwd', $nPass, PDO::PARAM_STR);
                    $stmt->execute();

                    header("location: ../change-password.php?success=Employee ID: ".$_SESSION["eid"]." password has been updated successfully.");
                }
                else {
                    header("location: ../change-password.php?error=New password and confirm new password do not match.");
                }
            }
            else {
                header("location: ../change-password.php?fail=Incorrect current password.");
            }
        }
        else {
            header("location: ../change-password.php?fail=Incorrect user, unable to change password");
        }
    }
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