<?php
    include '../database/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self' data; style-src 'self' 'unsafe-inline' https://unpkg.com; script-src 'self' 'unsafe-inline' https://unpkg.com; img-src 'self' data:;">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@300,400,500,600,700&display=swap" rel="stylesheet">
    <title>NFC REGISTRATION</title>
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <div class="registration-form-title">
        <h1>NFC REGISTRATION</h1>
    </div>
    <form action="register.php" method="post" id="register_form">
        <div class="border-line">
            <div class="webcam">
                <video id="video" autoplay>
                </video>
                <div class="webcam-btn">
                    <button id="snap">SNAP</button>
                    <button id="retry">RETRY</button>
                </div>
            </div>
            <div class="webcam">
                <div class="webcam-error" style="display: none;"></div>
            </div>
            <div class="webcam camera">
                <canvas id="canvas" ></canvas>
            </div>
        </div>

        <!-- Student Register Form-->
        <div class="input-form">
        <div class="input-field">
               <div class="email">
                    <input type="text" name="email" id="email" class="input"  placeholder="Email" required>
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
                    <input type="text" name="lrn" id="lrn" class="input"  placeholder="lrn" required>
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
                    <input type="text" name="NFC" id="NFC" class="input" placeholder="NFC CARD" required>
               </div>
            </div>
            <div class="button">
                <input type="submit" value="Submit" id="btn">
            </div>
        </div>
    </form>

    <!-- uncomment this line of code if something paranormal abnormal happened.
    <script>
        const email = document.getElementById('email');
        const last_name = document.getElementById('lastname');
        const lrn = document.getElementById('lrn');
        const first_name = document.getElementById('firstname');
        const grade_section = document.getElementById('grade-section');
        const adviser = document.getElementById('adviser');
        const NFC_CARD_KEY = document.getElementById('NFC');
        
        document.getElementById('btn').addEventListener('submit', async function(e){
            e.preventDefault();
            console.log('Button Clicked');
            try {
                const res = await fetch('../database/db.php', {
                    method : 'POST',
                    headers : {
                        'Content-Type' : 'application/json',
                    },
                    body : JSON.stringify({
                        email : email.value,
                        last_name : last_name.value,
                        first_name : first_name.value,
                        lrn : lrn.value,
                        grade_section : grade_section.value,
                        adviser : adviser.value,
                        NFC_CARD_KEY : NFC_CARD_KEY.value 
                    })
                });
                console.log('Successful');
            } catch (error) {
                console.log(`Error: ${error}`);
            }
        });
    </script>
    -->
    <script src="../config/createAcc.config.js"></script>
    <!--<script src="webcam.config.js"></script>-->
</body>
</html>