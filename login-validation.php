<?php

require("db-connect.php");

session_start();

if(isset($_POST["login"])) {
    $eid = checkInput($_POST["empNo"]);
    $pwd = checkInput($_POST["password"]);

    if (empty($eid)) {
        header("location: index.php?error=EmployeeID is Required");
    }
    else if (empty($pwd)) {
        header("location: index.php?error=Password is Required");
    }

    else {
        $hashpwd = md5($pwd);
        $stmt = $db->prepare("CALL LOGIN_VALIDATION(:eid, :password)");
        $stmt->bindParam(':eid', $eid, PDO::PARAM_INT);
        $stmt->bindParam(':password', $hashpwd, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result["empID"] === $eid && $result["empPassword"] === $hashpwd && $result["UserType"] === "admin") {

            $_SESSION["adminID"] = $result["empID"];
            $_SESSION["adminName"] = $result["empName"];

            header("location: admin/dashboard.php");
        }

        else if($result["empID"] === $eid && $result["empPassword"] === $hashpwd && $result["UserType"] === "user") {

            $_SESSION["eid"] = $result["empID"];
            $_SESSION["empName"] = $result["empName"];

            header("location: employee/dashboard.php");
        }

        else {
            header("location: index.php?error=Incorrect Employee ID or Password");
        }
    }
}
else {
    header("location: index.php");
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