<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/changeEmail.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Change Admin Email</title>
</head>
<body>
    <?php include_once("sidenav.php"); ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Change Admin Email</h3>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <form action="function/change-email.php" method="POST">
                    <div class="input-form">
                    <?php 
                        if (isset($_GET['success'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-success col-8" role="alert">
                                    <?=$_GET['success']?>
                                </div>
                            </div>
                        <?php 
                        }
                        else if (isset($_GET['error'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-warning col-8" role="alert">
                                    <?=$_GET['error']?>
                                </div>
                            </div>
                        <?php
                        }
                        else if (isset($_GET['fail'])) { ?>
                            <div class="d-flex justify-content-center">
                                <div class="alert alert-danger col-8" role="alert">
                                    <?=$_GET['fail']?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 ">
                                <input id="email_input" name="email" class="form-control" placeholder="New Email" autocomplete="off">
                                <label for="email_input">New Email</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="pass_input" type="password" name="pass" class="form-control" placeholder="Password">
                                <label for="pass_input">Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="confirm_pass_input" type="password" name="conPass" class="form-control" placeholder="confirm_pass">
                                <label for="confirm_pass_input">Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="save" class="btn btn-success col-sm-3"
                            id="saveEmail">SAVE</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>