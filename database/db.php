<?php

    $server_name = 'localhost';
    $user_name = 'root';
    $password = '';
    $db_name = 'nfc_data';
    $conn = new mysqli($server_name, $user_name, $password, $db_name);

    if (!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }

    $data = json_decode(file_get_contents("php://input"), true);
    $email = isset($data['email']) ? $data['email'] : null;
    $last_name = isset($data['last_name']) ? $data['last_name'] : null;
    $first_name = isset($data['first_name']) ? $data['first_name'] : null;
    $lrn = isset($data['lrn']) ? $data['lrn'] : null;
    $grade_section = isset($data['grade_section']) ? $data['grade_section'] : null;
    $adviser = isset($data['adviser']) ? $data['adviser'] : null;
    $NFC_CARD_KEY = isset($data['NFC_CARD_KEY']) ? $data['NFC_CARD_KEY'] : null;

    if ($email && $last_name && $first_name && $lrn && $grade_section && $adviser && $NFC_CARD_KEY) {
        $stmt = $conn->prepare("INSERT INTO nfcdata (email, lastname, firstname, lrn, gradeSection, adviser, nfcCardKey) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $last_name, $first_name, $lrn, $grade_section, $adviser, $NFC_CARD_KEY);
    
        if ($stmt->execute()) {
            echo json_encode(["success" => "Data inserted successfully"]);
        } else {
            echo json_encode(["error" => "Error inserting data: " . $stmt->error]);
        }
    
        $stmt->close();
    }


    $nfc_key = isset($_GET['nfc_key']) ? $_GET['nfc_key'] : null;

    if ($nfc_key) {
        $stmt = $conn->prepare("SELECT email, lastname, firstname, lrn, gradeSection, adviser, nfcCardKey FROM nfcdata WHERE nfcCardKey = ?");
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
?>