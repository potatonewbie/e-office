<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin/main.css">
    <link rel="stylesheet" href="../css/admin/sidenav.css">
    <link rel="stylesheet" href="../css/admin/employeeEntitlement.css">

    <?php include_once("../head.php"); ?>

    <title>Employee Leave Entitlement</title>
</head>
<body>
    <?php include_once("sidenav.php"); ?>
    
    <div class="container-fluid bg-light">
        <div class="content">
            <div class="leaveHistory d-flex align-items-center">
                <h3 class="me-auto d-inline-block">Employee Leave Entitlement</h3>
                <!-- BUTTON ADD HERE -->
            </div>
            <h5 class="fw-normal mt-3">Leave Entitlement</h5>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <table class="table p-2 mt-4">
                    <thead>
                        <tr>
                            <th scope="col">EMPLOYEE NUMBER</th>
                            <th scope="col">EMPLOYEE NAME</th>
                            <th scope="col">ANNUAL</th>
                            <th scope="col">MEDICAL</th>
                            <th scope="col">EMERGENCY</th>
                            <th scope="col">MATERNITY</th>
                            <th scope="col">PATERNITY</th>
                            <th scope="col">COMPASSIONATE</th>
                            <th scope="col">STUDY</th>
                            <th scope="col">EXAMINATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5 class="fw-normal mt-3">Leave Taken</h5>
            <div class="card mt-3 p-3 overflow-auto text-nowrap">
                <table class="table p-2 mt-4">
                    <thead>
                        <tr>
                            <th scope="col">EMPLOYEE NUMBER</th>
                            <th scope="col">EMPLOYEE NAME</th>
                            <th scope="col">ANNUAL</th>
                            <th scope="col">MEDICAL</th>
                            <th scope="col">EMERGENCY</th>
                            <th scope="col">MATERNITY</th>
                            <th scope="col">PATERNITY</th>
                            <th scope="col">COMPASSIONATE</th>
                            <th scope="col">STUDY</th>
                            <th scope="col">EXAMINATION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td>10001</td>
                            <td>Lim Wen Zhen</td>
                            <td>10</td>
                            <td>20</td>
                            <td>5</td>
                            <td>10</td>
                            <td>10</td>
                            <td>0</td>
                            <td>10</td>
                            <td>10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="js/navigation.js"></script>
</body>
</html>