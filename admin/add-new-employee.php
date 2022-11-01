<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/addNewEmp.css">

    <?php 
        include_once("../head.php");
        session_start();
        if(!isset($_SESSION['adminID']))
            header("location: ../index.php");
    ?>

    <title>Add New Employee Details</title>
</head>

<body>
    <?php 
        include_once("sidenav.php");
        include_once("function/employee-details.php");
    ?>

    <div class="container-fluid bg-light">
        <div class="content">
            <div class="addNewEmp d-flex align-items-center">
                <a href="employee-details.php" class="nav-link d-flex pe-4">
                    <i class="fas fa-chevron-left fa-lg"></i>
                </a>
                <h3 class="h3 d-inline-block">Add New Employee Details</h3>
            </div>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <form action="function/insert-new-employee.php" method="POST">
                    <div class="input-form">
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="joined_date_input" type="date" name="joinDate" 
                                    class="form-control" placeholder="dd-mm-yyyy" value="<?php echo date('Y-m-d') ?>" required>
                                <label for="joined_date_input">Joined Date</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emp_no_input" name="empID" type="text" class="form-control" placeholder="empID" 
                                    value="<?php echo getEmployeeID() + 1; ?>">
                                <label for="emp_no_input">Employee Number</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emp_name_input" type="text" name="empName" class="form-control" placeholder="empName" autocomplete="off" required>
                                <label for="emp_name_input">Employee Name</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                            <input id="email_input" type="text" name="email" class="form-control" placeholder="email" autocomplete="off" required>
                                <label for="department_input">Email</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                            <input id="position_input" type="text" name="position" class="form-control" value="Employee" autocomplete="off" required>
                                <label for="type_input">Position</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="annual_input" type="text" name="annual" class="form-control" value="8" required>
                                <label for="annual_input">Annual Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="medical_input" type="text" name="medical" class="form-control" value="0" required>
                                <label for="medical_input">Medical Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="emergency_input" type="text" name="emergency" 
                                    class="form-control" value="5" required>
                                <label for="emergency_input">Emergency Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="maternity_input" type="text" name="maternity" 
                                    class="form-control" value="60" required>
                                <label for="maternity_input">Maternity Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="paternity_input" type="text" name="paternity" 
                                    class="form-control" value="7" required>
                                <label for="paternity_input">Paternity Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="compassionate_input" type="text" name="compassionate" 
                                    class="form-control" value="3" required>
                                <label for="compassionate_input">Compassionate Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="study_input" type="text" name="study" 
                                    class="form-control" value="7" required>
                                <label for="study_input">Study Leave Entitlement</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="form-floating col-8 mt-3">
                                <input id="exam_input" type="text" name="exam" 
                                    class="form-control" value="7" required>
                                <label for="exam_input">Examination Leave Entitlement</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-end text-nowrap mt-5">
                        <button type="submit" name="addEmployee" class="btn btn-success col-sm-3"
                            id="AddNewEmp">ADD</button>
                        <button type="reset" name="reset" class="btn btn-danger col-sm-3">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="../js/navigation.js"></script>    
</body>
</html>