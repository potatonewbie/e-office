<?php

session_start();

require_once("../../db-connect.php");

if(isset($_POST["save"])) {
    $email = checkInput($_POST["email"]);
    $pass = $_POST["pass"];
    $conPass = $_POST["conPass"];

    if (empty($email)) {
        header("location: ../change-email.php?error=Email is required.");
    }
    else if (empty($pass)) {
        header("location: ../change-email.php?error=Password is required.");
    }
    else if (empty($conPass)) {
        header("location: ../change-email.php?error=Confirm Password is required.");
    }
    else {
        $pass = md5($pass);
        $conPass = md5($conPass);

        $stmt = $db->prepare("SELECT Email, empPassword FROM employee_info WHERE employee_info.UserType = 'admin'");
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["Email"] === $email) {

            header("location: ../change-email.php?error=New email cannot be same as previous email.");
        }
        else {

            if($result["empPassword"] === $pass) {

                if($pass === $conPass) {

                    $stmt = $db->prepare("UPDATE employee_info SET Email = :email WHERE employee_info.UserType = 'admin'");
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();

                    header("location: ../change-email.php?success=Email has been updated successfully.");
                }
                else {
                    header("location: ../change-email.php?error=Password and confirm password does not match.");
                }
            }
            else {
                header("location: ../change-email.php?fail=Incorrect password.");
            }
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