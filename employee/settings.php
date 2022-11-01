<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/employee/settings.css">

    <?php include_once("../head.php"); ?>

    <title>Settings</title>
</head>
<body>
    <?php include_once("sidenav.php"); ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <h3 class="fw-bold">Change Password</h3>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <form>
                    <div class="input-form">
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 ">
                                <input id="old_pass_input" name="empNo" type="password" class="form-control" placeholder="old_pass" required>
                                <label for="old_pass_input">Old Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="new_pass_input" type="password" name="password" class="form-control" placeholder="new_pass" required>
                                <label for="new_pass_input">New Password</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="confirm_pass_input" type="password" name="password" class="form-control" placeholder="confirm_pass" required>
                                <label for="confirm_pass_input">Confirm New Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="submit" class="btn btn-success col-sm-3"
                            id="ApproveRequest">SAVE</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../admin/js/navigation.js"></script>
</body>
</html>