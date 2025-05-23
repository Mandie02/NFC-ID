<?php
    include '../../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="Content-Security-Policy"
        content="default-src 'self' data; style-src 'self' 'unsafe-inline' https://unpkg.com; script-src 'self' 'unsafe-inline' https://unpkg.com; img-src 'self' data:;"> -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,600,700&display=swap" rel="stylesheet">
    <title>NFC-ID REGISTRATION</title>
    <link rel="stylesheet" href="../../styles/register.css">
    <script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function(){
            emailjs.init({
            publicKey: "e3HcydfpA2ND2eOiG",
            });
        })();
    </script>
</head>
<body>
    <nav>
        <div class="nav-container">
            <div class="nav-content">
                <div class="logo">
                    <img src="../../image/logo.png" alt="Lagro Image">
                </div>
                <div class="nav-header">
                    <h1>LAGRO NFC-ID</h1>
                </div>
            </div>
        </div>    
    </nav>
<main>

    <header>
        <div class="header-register-form" data-aos="fade-up" data-aos-duration="2000">
            <h1>LAGRO NFC ID REGISTER</h1>
        </div>
    </header>

    <!-- Student Register Form-->
    <form action="register.php" method="post" id="register_form" data-aos="zoom-in" data-aos-duration="1500">
        <div class="input-form">
            <div class="upload-image">
                <label for="file-name">Profile: </label>
                <input type="file" name="file-name" accept="image/*"  id="img-id" placeholder="ID PICTURE">
            </div>
            <div class="input-field">
               <div class="email">
                    <input type="email" name="email" id="email" class="input"  placeholder="Email" required>
               </div>
            </div>
            <div class="input-field">
               <div class="last-name">
                    <input type="text" name="lastname" id="lastname" class="input"  placeholder="Last Name" required>
               </div>
            </div>
            <div class="input-field">
               <div class="first-name">
                    <input type="text" name="firstname" id="firstname" class="input" placeholder="First Name"required>
               </div>
            </div>
            <div class="input-field">
                <div class="lrn">
                    <input type="number" name="lrn" id="lrn" class="input"  placeholder="LRN" required>
                </div>
            </div>
            <div class="input-field">
                <div class="grade-section">
                    <input type="text" name="grade-section" id="grade-section" class="input" placeholder="Grade & Section" required>
                </div>
            </div>
            <div class="input-field">
               <div class="adviser">
                    <input type="text" name="adviser" id="adviser" class="input" placeholder="Adviser Teacher" required>
               </div>
            </div>
            <div class="input-field">
                <div class="NFC">
                    <input type="number" name="NFC" id="NFC" class="input" placeholder="NFC CARD" required>
                </div>
            </div>
        </div>
    </form>
</main>

    <div class="modal">
        <div class="modal-content">
            <div class="create-acc-successfully">
                <h1 id="msg-greet"></h1>
            </div>
        </div>
    </div>

    <script src="../../config/createAcc.config.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>