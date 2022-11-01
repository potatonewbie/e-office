<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="icon" href="misc/LLAS.png">

    <title>Request Decline</title>

    <?php
        include_once("head.php");
        require("db-connect.php");
    ?>
</head>
<body>
    <?php
        if(isset($_GET['id'])) {
            $leaveID = $_GET['id'];
            $stmt = $db->prepare("SELECT leaveStatus FROM leave_request WHERE leaveID = :id");
            $stmt->bindParam(':id', $leaveID, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
        }
        else {
            header("location: index.php");
        }
    ?>
    <div class="login-div">
        <div class="row text-center">
            <div class="col-md-3">
                <img src="misc/LLAS.png" class="img-fluid" alt="LLAS Logo" style="width:108px;height:118px;">
            </div>
            <div class="col-md-9 align-self-center">
                <p style="font-size:27px;">LER LUM ADVISORY SERVICES SDN BHD</p>
            </div>
            <hr/>
            <?php
                if($result === false){
                    echo "<p class='text-center' style='font-size:18px;'><strong>Leave is Deleted or Does Not Exists</strong></p>";
                }
                else if($result['leaveStatus'] === "Approved"  || $result['leaveStatus'] === "Declined")
                    echo "<p class='text-center' style='font-size:18px;'><strong>You Have Already Updated This Leave</strong></p>";
                
                else if($result['leaveStatus'] === "Pending") {
                    $status = 'Declined';
                    $stmt = $db->prepare("CALL REQUEST_STATUS_UPDATE(:leaveID, :status)");
                    $stmt->bindParam(':leaveID', $leaveID, PDO::PARAM_INT);
                    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
                    $stmt->execute();

                    echo "<p class='text-center' style='font-size:18px;'><strong>Leave Status Updated to Declined</strong></p>";
                }
            ?>
        </div>
    </div>
</body>
</html>