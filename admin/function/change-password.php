<?php

session_start();

require("../../db-connect.php");

if(isset($_POST["save"])) {
    $oPass = $_POST["oldPass"];
    $nPass = $_POST["newPass"];
    $cnPass = $_POST["conNewPass"];

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

        $stmt = $db->prepare("SELECT empPassword FROM employee_info WHERE employee_info.UserType = 'admin'");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["empPassword"] === $oPass) {

            if($nPass === $cnPass) {

                $stmt = $db->prepare("UPDATE employee_info SET empPassword = :pwd WHERE employee_info.UserType = 'admin'");
                $stmt->bindParam(':pwd', $nPass, PDO::PARAM_STR);
                $stmt->execute();

                header("location: ../change-password.php?success=Password has been updated successfully.");
            }
            else {
                header("location: ../change-password.php?error=New password and confirm new password does not match.");
            }
        }
        else {
            header("location: ../change-password.php?fail=Incorrect current password.");
        }
    }
}

?>