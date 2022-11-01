<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="icon" href="misc/LLAS.png">

    <title>Request Approve</title>

    <?php
        include_once("head.php");
        require("db-connect.php");
    ?>
</head>
<body>
    <?php
        if(isset($_GET['id'])) {
            $leaveID = $_GET['id'];
            $stmt = $db->prepare("SELECT empID, leaveType, dayRequest, leaveStatus FROM leave_request WHERE leaveID = :id");
            $stmt->bindParam(':id', $leaveID, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);        
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
                if(sizeof($result) === 0){
                    echo "<p class='text-center' style='font-size:18px;'><strong>Leave is Deleted or Does Not Exists</strong></p>";
                }
                else if($result[0]['leaveStatus'] === "Approved"  || $result[0]['leaveStatus'] === "Declined")
                    echo "<p class='text-center' style='font-size:18px;'><strong>You Have Already Updated This Leave</strong></p>";
                
                else if($result[0]['leaveStatus'] === "Pending") {
                    $stmt = $db->prepare("UPDATE leave_request SET leaveStatus = 'Approved' WHERE leaveID = :id");
                    $stmt->bindParam(':id', $leaveID, PDO::PARAM_INT);
                    $stmt->execute();

                    $empID = $result[0]['empID'];
                    $leaveType = $result[0]['leaveType'];
                    $dayRequest = $result[0]['dayRequest'];
                    
                    // Update the leave balance and leave taken
                    if($leaveType === "Annual Leave") {
                        $stmt2 = $db->prepare("UPDATE leave_balance SET Annual_Leave = Annual_Leave - :dayRequest WHERE empID = :empID");
                        $stmt2->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt2->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt2->execute();

                        $stmt3 = $db->prepare("UPDATE leave_taken SET Annual_Leave = Annual_Leave + :dayRequest WHERE empID = :empID");
                        $stmt3->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt3->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt3->execute();
                    }
                    else if($leaveType === "Medical Leave") {
                        $stmt4 = $db->prepare("UPDATE leave_balance SET Medical_Leave = Medical_Leave - :dayRequest WHERE empID = :empID");
                        $stmt4->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt4->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt4->execute();
                
                        $stmt5 = $db->prepare("UPDATE leave_taken SET Medical_Leave = Medical_Leave + :dayRequest WHERE empID = :empID");
                        $stmt5->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt5->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt5->execute();
                    }
                    else if($leaveType === "Emergency Leave") {
                        $stmt6 = $db->prepare("UPDATE leave_balance SET Emergency_Leave = Emergency_Leave - :dayRequest WHERE empID = :empID");
                        $stmt6->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt6->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt6->execute();
                
                        $stmt7 = $db->prepare("UPDATE leave_taken SET Emergency_Leave = Emergency_Leave + :dayRequest WHERE empID = :empID");
                        $stmt7->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt7->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt7->execute();
                    }
                    else if($leaveType === "Maternity Leave") {
                        $stmt8 = $db->prepare("UPDATE leave_balance SET Maternity_Leave = Maternity_Leave - :dayRequest WHERE empID = :empID");
                        $stmt8->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt8->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt8->execute();
                
                        $stmt9 = $db->prepare("UPDATE leave_taken SET Maternity_Leave = Maternity_Leave + :dayRequest WHERE empID = :empID");
                        $stmt9->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt9->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt9->execute();
                    }
                    else if($leaveType === "Paternity Leave") {
                        $stmt10 = $db->prepare("UPDATE leave_balance SET Paternity_Leave = Paternity_Leave - :dayRequest WHERE empID = :empID");
                        $stmt10->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt10->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt10->execute();
                
                        $stmt11 = $db->prepare("UPDATE leave_taken SET Paternity_Leave = Paternity_Leave + :dayRequest WHERE empID = :empID");
                        $stmt11->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt11->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt11->execute();
                    }
                    else if($leaveType === "Compassionate Leave") {
                        $stmt12 = $db->prepare("UPDATE leave_balance SET Compassionate_Leave = Compassionate_Leave - :dayRequest WHERE empID = :empID");
                        $stmt12->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt12->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt12->execute();
                
                        $stmt12 = $db->prepare("UPDATE leave_taken SET Compassionate_Leave = Compassionate_Leave + :dayRequest WHERE empID = :empID");
                        $stmt12->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt12->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt12->execute();
                    }
                    else if($leaveType === "Study Leave") {
                        $stmt13 = $db->prepare("UPDATE leave_balance SET Study_Leave = Study_Leave - :dayRequest WHERE empID = :empID");
                        $stmt13->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt13->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt13->execute();
                
                        $stmt13 = $db->prepare("UPDATE leave_taken SET Study_Leave = Study_Leave + :dayRequest WHERE empID = :empID");
                        $stmt13->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt13->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt13->execute();
                    }
                    else if($leaveType === "Examination Leave") {
                        $stmt14 = $db->prepare("UPDATE leave_balance SET Examination_Leave = Examination_Leave - :dayRequest WHERE empID = :empID");
                        $stmt14->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt14->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt14->execute();
                
                        $stmt15 = $db->prepare("UPDATE leave_taken SET Examination_Leave = Examination_Leave + :dayRequest WHERE empID = :empID");
                        $stmt15->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt15->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt15->execute();
                    }
                    else if($leaveType === "Unpaid Leave") {
                        $stmt16 = $db->prepare("UPDATE leave_taken SET Unpaid_Leave = Unpaid_Leave + :dayRequest WHERE empID = :empID");
                        $stmt16->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt16->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt16->execute();
                    }
                    else if($leaveType === "Others") {
                        $stmt16 = $db->prepare("UPDATE leave_taken SET Others = Others + :dayRequest WHERE empID = :empID");
                        $stmt16->bindParam(':dayRequest', $dayRequest, PDO::PARAM_INT);
                        $stmt16->bindParam(':empID', $empID, PDO::PARAM_INT);
                        $stmt16->execute();
                    }

                    echo "<p class='text-center' style='font-size:18px;'><strong>Leave Status Updated to Approved</strong></p>";
                }  
            ?>
        </div>
    </div>
</body>
</html>