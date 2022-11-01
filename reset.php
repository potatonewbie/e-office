<?php

require("db-connect.php");

if(isset($_POST['submit']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['empNo'])) {
    $empNo = $_POST['empNo'];
    $password = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);

    if($password != $confirm_password) {
        header("location: reset-password.php?error=Password and Confirm Password Is Not The Same&id=$empNo");
    }

    else if($password === $confirm_password) {
        $stmt = $db->prepare("UPDATE employee_info SET empPassword = :pass WHERE empID = :eid");
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);
        $stmt->bindParam(':eid', $empNo, PDO::PARAM_INT);
        $stmt->execute();

        header("location: index.php?success=Password Reset");
    }
}
else {
    header("location: forgot-pwd.php");
}

?>