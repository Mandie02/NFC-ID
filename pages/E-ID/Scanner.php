<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E ID SCANNER</title>
</head>
<body>
    <div class="div">
        <div class="header">
            <h1>NFC Scanner</h1>
        </div>
        <div class="nfc-scanner">
            <div class="nfc-scanner-btn">
                <button id="scan">SCAN</button>
                <button>STOP</button>
            </div>
            <div class="nfc-scanner-error" style="display: none;">
                <p>ERROR: NFC SCANNER NOT DETECTED</p>
            </div>
            <div style="display: none;">
                <p id="nfc-access">Your device have NFC reader.</p>
            </div>

            <div class="error-handler">
                <p id="error"></p>
            </div>

            <div>
                <h1 id="nfc-id"></h1>
            </div>
        </div>
    </div>

    <script src="../../config/onRead.eID.js"></script>
</body>
</html>