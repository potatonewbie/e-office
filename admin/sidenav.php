<!-- main side navbar -->
<div class="navbar position-fixed d-flex flex-column" id="main-navbar">
    <div class="d-flex align-items-center mt-2 position-fixed">
        <img src="../misc/LLAS.png" width="128px" height="138px"></img>
    </div>
    <div id="main-navbar">
        <ul class="nav nav1 flex-column w-100">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link d-flex align-items-center ps-4">
                    <img src="../misc/dashboard-icon.svg" alt="Dashboard icon">
                    <span class="mx-3">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="pending-request.php" class="nav-link d-flex align-items-center ps-4">
                    <img src="../misc/approve-leave-icon.svg" alt="PendingRequest icon">
                    <span class="mx-3">Pending Requests</span>
                </a>
            </li>
                            
            <li class="nav-item">
                <a href="leave-history.php" class="nav-link d-flex align-items-center ps-4">
                    <img src="../misc/history-icon.svg" alt="History icon">
                    <span class="mx-3">Leave History</span>
                </a>
            </li> 
                            
            <li class="nav-item">
                <a href="employee-details.php" class="nav-link d-flex align-items-center ps-4">
                    <img src="../misc/person-icon.svg" alt="EmployeeDetails icon">
                    <span class="mx-3">Employee Details</span>
                </a>
            </li> 
                            
            <li class="nav-item">
                <a href="employee-balance.php" class="nav-link d-flex align-items-center ps-4">
                    <img src="../misc/add-file-icon.svg" alt="Dashboard icon">
                    <span class="mx-3">Leave Balance</span>
                </a>
            </li>

            <li class="nav-item">
                <a role="button" href="#collapse-settings" class="nav-link settings d-flex align-items-center ps-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-settings">
                    <img src="../misc/settings-icon.svg" alt="Settings icon">
                    <span class="mx-3">Settings</span>
                    <img src="../misc/back-icon.svg" alt="Back icon" class="arrow"></i>
                </a>
                <div class="collapse" id="collapse-settings">
                    <ul class="nav nav2 flex-column w-100">
                        <li class="nav-item">
                            <a href="change-number.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Admin Number</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="change-email.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Admin Email</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="change-password.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>

<!-- top navbar -->
<nav class="navbar fixed-top top-navbar">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button">
        <img src="../misc/toggler-icon.svg" width="25" height="25"></img>
    </button>
    <!-- Overlay -->
    <div class="overlay d-flex d-lg-none"></div>

    <!-- SideNavBar -->
    <div class="sidebar order-lg-2 d-lg-flex w-100 pb-3 pb-lg-0">
        <div class="text-center mt-3">
            <img src="../misc/LLAS.png" width="100px" height="100px"></img>
        </div>
        <ul class="navbar-nav mr-lg-auto mb-2 mb-lg-0 mt-2">
        <li class="nav-item">
                <a href="dashboard.php" class="nav-link d-flex align-items-center px-3 ps-4">
                    <img src="../misc/dashboard-icon.svg" alt="Dashboard icon">
                    <span class="mx-3">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="pending-request.php" class="nav-link d-flex align-items-center px-3 ps-4">
                    <img src="../misc/approve-leave-icon.svg" alt="PendingRequest icon">
                    <span class="mx-3">Pending Requests</span>
                </a>
            </li>
                            
            <li class="nav-item">
                <a href="leave-history.php" class="nav-link d-flex align-items-center px-3 ps-4">
                    <img src="../misc/history-icon.svg" alt="History icon">
                    <span class="mx-3">Leave History</span>
                </a>
            </li> 
                            
            <li class="nav-item">
                <a href="employee-details.php" class="nav-link d-flex align-items-center px-3 ps-4">
                    <img src="../misc/person-icon.svg" alt="EmployeeDetails icon">
                    <span class="mx-3">Employee Details</span>
                </a>
            </li> 
                            
            <li class="nav-item">
                <a href="employee-balance.php" class="nav-link d-flex align-items-center px-3 ps-4">
                    <img src="../misc/add-file-icon.svg" alt="Dashboard icon">
                    <span class="mx-3">Leave Balance</span>
                </a>
            </li>

            <li class="nav-item">
                <a role="button" href="#collapse-settings" class="nav-link settings d-flex align-items-center px-3 ps-4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-settings">
                    <img src="../misc/settings-icon.svg" alt="Settings icon">
                    <span class="mx-3">Settings</span>
                    <img src="../misc/back-icon.svg" alt="Back icon" class="arrow"></i>
                </a>
                <div class="collapse" id="collapse-settings">
                    <ul class="nav nav2 flex-column w-100">
                        <li class="nav-item">
                            <a href="change-number.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Admin Number</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="change-email.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Admin Email</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="change-password.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Change Password</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link settings-content d-flex align-items-center">
                                <span class="mx-3 settings-content-btn">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div class="navbar-brand ms-auto d-flex align-items-center">
        <img src="../misc/LLAS.png" alt="CompanyLogo" width="30" height="30" class="d-inline-block align-text-top">
        <span class="companyName fw-bold fs-6 px-2">LER LUM ADVISORY SERVICES</span>
    </div>
  </div>

  <script>
    var myCollapse = document.getElementById('myCollapse')
    var bsCollapse = new bootstrap.Collapse(myCollapse, {
        toggle: false
    })
 </script>
</nav>