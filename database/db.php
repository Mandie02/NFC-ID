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

    $sql = "SELECT email, lastname, firstname, lrn, gradeSection, adviser, nfcCardKey FROM nfcdata";
    $result = $conn->query($sql);

    $conn->close();
?>