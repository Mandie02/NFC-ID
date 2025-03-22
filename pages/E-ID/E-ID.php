
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/E-ID.css">
    <title>LHS NFC-ID</title>
</head>
<body>
    <div class="id-container">
        <div class="nfc-id-content">

            <div class="school-logo">
                <img src="../../image/logo.png" alt="" class="lagro-logo">
                <p>LAGRO HIGH SCHOOL</p>
            </div>

            <div class="nfc-user-image">
                <img alt="NFC-ID" id="nfc-image" class="nfc-image" src="../../image/logo.png">
            </div>

            <div class="info-content">
                <div class="nfc-user">
                    <label for="fullname">NAME: </label>
                    <h1 id="user-fullname" name="fullname">USER</h1>
                </div>
                <div class="nfc-user">
                    <label for="lrn">LRN: </label>
                    <h1 id="user-lrn" name="lrn">123456789012</h1>
                </div>
                <div class="nfc-user">
                    <label for="grade-section">GRADE & SECTION: </label>
                    <h1 id="user-grade-section" name="grade-section">12-Babbage</h1>
                </div>
                <div class="nfc-user">
                    <label for="adviser">ADVISER: </label>
                    <h1 id="user-adviser" class="adviser" name="adviser">Juan Dela Cruz</h1>
                </div>
            </div>
        </div>

    </div>
    <div class="nfc-key-container">
        <input type="text" id="nfcInput"  class="nfc-input" placeholder="Enter NFC Key">            
    </div>

    <script src="../../config/Scan.js"></script>
</body>
</html>