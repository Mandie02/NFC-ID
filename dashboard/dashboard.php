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
</head>
<body>
    <main class="bg-light d-flex">    
        <div id="sidebar" class="position-sticky flex-cloumn flex-shrink-0 p-3 text-white border-end">
            <a class="d-flex align-items-center mb-3 text-white text-decoration-none" href="#" 
            data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span id="dashboard-title" class="fs-8">NFC-ID DASHBOARD</span>
                <i id="ham-menu" class="bi bi-list mx-5 text-white fs-2" style="width: 16; height: 16;"></i>  
                <i id="close-menu" class="bi bi-x mx-5 text-white fs-2" style="display: none; width: 17; height: 16"></i>
            </a>
            <hr style="color: white;">
            <!-- Admin Sidebar-->
            <ul class="admin-nav nav nav-pills flex-column mb-auto">
                <li class="nav-item  my-2">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-database me-2" style="width: 16; height: 16;"></i>
                        NFC USER
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-person-circle me-2" style="width: 16; height: 16;"></i>
                        NFC Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-gear me-2" style="width: 16; height: 16;"></i>
                        Settings
                    </a>
                </li>
            </ul>
            <!-- Student Dashboard -->
            <ul class="student-nav nav nav-pills flex-column mb-auto" style="display: none;">
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-database me-2"></i>
                        NFC USER
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-person-circle me-2"></i>
                        NFC-ID
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="#">
                        <i class="bi bi-gear me-2"></i>
                        Settings
                    </a>
                </li>
            </ul>

        </div>
        
        <div class="container">
            <h1>nfc lagro</h1>
        </div>
        <!-- ADMIN Panel-
        <div class="container d-flex table-container">
            <table>
                <td>
                    <tr>NAME</tr>
                    <tr>SECTION</tr>
                    <tr>TIME</tr>
                    <tr>DATE</tr>
                </td>
                <td>
                    <tr></tr>
                </td>
            </table>
        </div>
        ->
        <!-- STUDENT Panel
        <div class="container">
            <div class="box box-1">
                <div class="box-content">

                    <h1 class="user-count">200k</h1>
                </div>
            </div>

            <div class="box box-2">

            </div>
        </div>
        -->
    </main>

</body>
</html>