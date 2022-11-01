<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/changePass.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Change Password</title>
</head>
<body>
    <?php include_once("sidenav.php"); ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Change Password</h3>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <form action="function/change-password.php" method="POST">
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
                                <input id="old_pass_input" type="password" name="oldPass" class="form-control" placeholder="Current Password">
                                <label for="old_pass_input">Current Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="new_pass_input" type="password" name="newPass" class="form-control" placeholder="New Password">
                                <label for="new_pass_input">New Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="confirm_pass_input" type="password" name="conNewPass" class="form-control" placeholder="Confirm Password">
                                <label for="confirm_pass_input">Confirm New Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="save" class="btn btn-success col-sm-3"
                            id="savePass">SAVE</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../js/navigation.js"></script>
</body>
</html>