<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/employee/dashboard.css">

    <?php 
        include_once("../head.php");  
        session_start();
        if(!isset($_SESSION['eid']))
            header("location: ../index.php");
    ?>

    <title>Employee Dashboard</title>
</head>
<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/get-dashboard-info.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Dashboard</h3>
        <?php
            if(date("m") === "12") {
                echo "<div class='alert alert-info' role='alert'>
                        <b>Reminder:</b> You are hardworking enough, please spend all the unused leave before welcoming a new year!
                      </div>";
            }

        ?>
            <h5 class="fw-normal mt-3">Personal Profile</h5>
            <div class="card">
                <div class="card-body overflow-auto">
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <p class="fw-normal">Employee Number:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $_SESSION['eid'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Employee Name:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $_SESSION['empName'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="fw-normal mt-4">Leave Balance</h5>
            <div class="card">
            <?php 
                $result = getAllLeaveBalance();

                foreach($result as $row) {
            ?>
                <div class="card-body overflow-auto">
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <p class="fw-normal">Annual Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Annual_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Medical Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Medical_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Emergency Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Emergency_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Maternity Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Maternity_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Paternity Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Paternity_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Compassionate Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Compassionate_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Study Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Study_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Examination Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Examination_Leave"] ?></p>
                        </div>
                    </div>
            <?php
                }
            ?>
                </div>
            </div>
            <h5 class="fw-normal mt-4">Leave Taken</h5>
            <div class="card">
            <?php 
                $result = getAllLeaveTaken();

                foreach($result as $row) {
            ?>
                <div class="card-body overflow-auto">
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <p class="fw-normal">Annual Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Annual_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Medical Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Medical_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Emergency Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Emergency_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Maternity Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Maternity_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Paternity Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Paternity_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Compassionate Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Compassionate_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Study Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Study_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Examination Leave:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Examination_Leave"] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <p class="fw-normal">Others:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="fw-normal"><?php echo $row["Others"] ?></p>
                        </div>
                    </div>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>