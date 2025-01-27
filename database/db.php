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

    if(empty($email) && empty($last_name) && empty($first_name) && empty($lrn) && empty($grade_section) && empty($adviser) && empty($NFC_CARD_KEY)) {
        // will continue here tomorrow :>
        //don't forget mandie
    }

    $SQL = "INSERT INTO `nfcdata` (`email`, `lastname`, `firstname`, `lrn`, `gradeSection`, `adviser`, `nfcCardKey`)
        VALUES('$email', '$last_name', '$first_name', '$lrn', '$grade_section', '$adviser', '$NFC_CARD_KEY')";

    if ($conn->query($SQL) === TRUE) {
        echo json_encode(["message" => "Record inserted successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $SQL . "<br>" . $conn->error]);
    }

    $conn->close();
?>