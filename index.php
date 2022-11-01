<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link rel="icon" href="misc/LLAS.png">

    <title>LLAS E-Office System</title>

    <?php
        include_once("head.php");
    ?>

</head>
<body>
    <div class="login-div">
        <form action="login-validation.php" method="POST">
            <div class="row text-center">
                <div class="col-md-3">
                    <img src="misc/LLAS.png" class="img-fluid" alt="LLAS Logo" style="width:128px;height:138px;">
                </div>
                <div class="col-md-9 align-self-center">
                    <p style="font-size:30px;">LER LUM ADVISORY SERVICES SDN BHD</p>
                </div>
            </div>
            <p class="text-center" style="font-size:30px;"> SIGN IN </p>
            <?php 
                if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?=$_GET['success']?>
                    </div>
            <?php 
                }
                if (isset($_GET['error'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?=$_GET['error']?>
                </div>
            <?php } ?>
            <div class="form-floating">
                <input id="emp_num_input" name="empNo" type="text" class="form-control" placeholder="emp_num" autocomplete="off" required>
                <label for="emp_num_input">Employee Number</label>
            </div>
            <div class="form-floating mt-3">
                <input id="pass_input" type="password" name="password" class="form-control" placeholder="password" required>
                <label for="pass_input">Password</label>
            </div>
            <p class="text-end"><a href="forgot-pwd.php"> Forgot your password? </a></p>
            <div class="text-center">
                <button type="submit" name="login" class="btn btn-success col-8">SIGN IN</button>
            </div>
        </form>
   </div>

</body>
</html>


