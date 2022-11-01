<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../phpmailer/vendor/autoload.php';


$stmt = $db->prepare("SELECT Email FROM employee_info WHERE UserType = 'admin'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$email = $result['Email'];

//$_SESSION["eid"]
$stmt2 = $db->prepare("SELECT MAX(leaveID) AS leaveID FROM leave_request WHERE empID = :eid AND leaveStatus = 'Pending'");
$stmt2->bindParam(':eid', $_SESSION["eid"], PDO::PARAM_INT);
$stmt2->execute();
$result2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$leaveID = $result2['leaveID'];

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$bodytext = "Employee ".$_SESSION['empName']. " apply for ".$datediff." day(s) ".$leaveType;

// Create URL for approving and decline leave
$approvePATH = str_replace("/employee/function/apply-leave.php", "/approve.php?id=", $_SERVER['REQUEST_URI']);
$declinePATH = str_replace("/employee/function/apply-leave.php", "/decline.php?id=", $_SERVER['REQUEST_URI']);
$approveURL = "<a href='".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$approvePATH. $leaveID."'>Approve Leave</a>";
$declineURL = "<a href='".(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://".$_SERVER['HTTP_HOST'].$declinePATH. $leaveID."'>Decline Leave</a>";

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
    $mail->Subject = 'Employee Pending Request';
    $mail->Body    = $bodytext . "<br><b>From: ".$startDate."</b><br><b>To: ".$endDate."</b><br><b>Leave Reason: </b>".$leaveReason."<br><br>" . $approveURL . "<br><br>" . $declineURL;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>