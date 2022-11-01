<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require('phpmailer/vendor/autoload.php');
require("db-connect.php");

if(isset($_POST['empNo']) && isset($_POST['submit'])) {
    $empNo = checkInput($_POST['empNo']);

    if(empty($empNo)) {
        header("location: forgot-pwd.php?error=Employee Number Is Empty");
    }
    else {
        $stmt = $db->prepare("SELECT Email FROM employee_info WHERE empID = :eid");
        $stmt->bindParam(':eid', $_POST['empNo'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result === false) {
            header("location: forgot-pwd.php?error=Employee Number Does Not Exists");
        }
        else {
            $email = $result['Email'];

            // Email Body Text
            $bodytext = "Click the link below to reset your password";
            // Create URL for reset password
            $PATH = str_replace("/reset-password-email.php", "/reset-password.php?id=", $_SERVER['REQUEST_URI']);
            $URL = "<a href='".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$PATH.$empNo."'>Reset Password</a>";

            //Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'generatedmail7@gmail.com';                     //SMTP username
                $mail->Password   = 'TestingAccount123';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                //Recipients
                $mail->setFrom('generatedmail7@gmail.com', 'Auto-Generate-Mail');
                $mail->addAddress($email);     //Add a recipient
                
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset Password';
                $mail->Body    = $bodytext . "<br>" . $URL;
                
                $mail->send();
                header("location: forgot-pwd.php?success=Password Reset Email Has Been Sent");
            }
            catch(Exception $e) {
                header("location: forgot-pwd.php?error={$mail->ErrorInfo}");
                exit;
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