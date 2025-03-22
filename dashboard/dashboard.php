<?php
   /* if(!defined('SECURE_ACCESS')) {
        die('
            <h1>Direct access not permitted.</h1>
            <p>Only <strong>ADMIN</strong> can access this page.</p>
        ');
    }
    */

    include_once '../database/db.php';
    //include_once './dashboard/dashboard.db.php';

    $query = "SELECT * FROM  `nfcdata`";
    $result = mysqli_query($conn, $query);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFC-ID DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="../styles/dashboard.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#">NFC DASHBOARD</a>
                </div>
            </div>
            <hr class="text-white">
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-database me-2"></i>
                        <span>NFC USERS</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-badge"></i>
                        <span>NFC PROFILE</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside> 
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <i class="bi bi-person-circle text-dark avatar"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded text-center">
                                Admin Mandie
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">Admin Dashboard</h3>
                        <div class="row">
                            <!-- NFC USER -->
                            <div class="col-12 col-md-4 ">
                                <div class="card border-0">
                                    <div class="card-body py-4">
                                        <h5 class="mb-2 fw-bold">Total Users</h5>
                                        <p class="mb-2 fw-bold">
                                            2
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +0.2%
                                            </span>
                                            <span class=" fw-bold">
                                                Since Last Month
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row student-list">
                            <div class="col-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="highlight">
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Grade & Section</th>
                                            <th scope="col">Lrn</th>
                                            <th scope="col">Adviser</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">NFC ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td id="nfc-user-name"><input class="edit-input" type="text" id="fullname-input" value="<?php echo "{$row['lastname']} {$row['firstname']}"?>">
                                                <p class="td"><?php echo "{$row['lastname']} {$row['firstname']}"?></p>
                                            </td>
                                            <td id="nfc-grade&section"><input class="edit-input" type="text" id="gradeSection-input" value="<?php echo "{$row['gradeSection']}"?>">
                                                <p class="td"><?php echo "{$row['gradeSection']}"?></p>
                                            </td>
                                            <td id="nfc-lrn"><input class="edit-input" type="text" id="lrn-input" value="<?php echo "{$row['lrn']}"?>">
                                                <p class="td"><?php echo "{$row['lrn']}"?></p>
                                            </td>
                                            <td id="nfc-adviser"><input class="edit-input" type="text" id="adviser-input" value="<?php echo "{$row['adviser']}"?>">
                                                <p class="td"><?php echo "{$row['adviser']}"?></p>
                                            </td>
                                            <td id="nfc-email"><input class="edit-input" type="text" id="email-input" value="<?php echo "{$row['email']}"?>">
                                                <p class="td"><?php echo "{$row['email']}"?></p>
                                            </td>
                                            <td id="nfc-key"><input class="edit-input" type="number" id="nfckey-input" value="<?php echo "{$row['nfcCardKey']}"?>">
                                                <p class="td"><?php echo "{$row['nfcCardKey']}"?></p>
                                            </td>
                                            <td>
                                                <button class="btn bg-info" id="view-btn">VIEW</button>
                                                <button class="btn btn-primary" id="edit-btn">EDIT</button>
                                                <button class="btn btn-danger" id="del-btn">DELETE</button>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- MODALS -->

    <script>
        const hamBurger = document.querySelector(".toggle-btn");

            hamBurger.addEventListener("click", () => {
            document.querySelector("#sidebar").classList.toggle("expand");
        });
    </script>
    <script src="../config/admin.config.js"></script>
</body>
</html>