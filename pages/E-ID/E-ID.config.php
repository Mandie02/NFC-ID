<?php
    include '../../database/db.php';
    
    header("Content-Type: application/json");
        // Get the nfckey from the database end pass to javascript scan.js file
        $nfc_key = isset($_GET['nfc_key']) ? $_GET['nfc_key'] : null;

        if ($nfc_key) {
            $stmt = $conn->prepare("SELECT email, lastname, firstname, lrn, gradeSection, adviser, nfcCardKey, user_img FROM nfcdata WHERE nfcCardKey = ?");
            $stmt->bind_param("s", $nfc_key);
            $stmt->execute();
            $result = $stmt->get_result();
    
            $data = [];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                echo json_encode($data);
            } else {
                echo json_encode(["error" => "No data found for the provided NFC key"]);
            }
            $stmt->close();
        } else {
            echo json_encode(["error" => "NFC key is required"]);
        }
        $conn->close();
        /*
        if (isset($_GET['nfc_key'])) {
            $nfcKey = $_GET['nfc_key'];
        
            $sql = "SELECT firstname, lastname, lrn, gradeSection, adviser, user_img FROM nfcdata WHERE nfcCardKey = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $nfcKey);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($row = $result->fetch_assoc()) {
                if (!empty($row['user_img'])) {
                    $finfo = finfo_open(FILEINFO_MIME_TYPE);
                    $imageType = finfo_buffer($finfo, $imageData);
                    finfo_close($finfo);
        
                    if (strpos($imageType, 'image') !== false) {
                        $row['user_img'] = "data:$imageType;base64," . base64_encode($imageData);
                    } else {
                        $row['user_img'] = null; 
                    }
                } else {
                    $row['user_img'] = null;
                }
        
                echo json_encode([$row]);
            } else {
                echo json_encode(["error" => "User not found"]);
            }
        
            $stmt->close();
        } 
        
        $conn->close(); */

?>
