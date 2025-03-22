<?php
    $server = "localhost";
    $user_name = "root";
    $password =  "";
    $db_name = "nfc_data";

    header("Content-Type : application/json");
    $conn = new mysqli($server, $user_name, $password, $db_name);
    if(!$conn) {
        echo json_encode(["Connection Error: ". mysqli_connect_error()]);
    }

    $sql = "SELECT * FROM nfcdata";
    $result = $conn->query($sql);

    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);

    $conn->close();
    

    if(!defined('SECURE_ACCESS')) {
        die('
            <h1>Direct access not permitted.</h1>
            <h4>You dont have permission to access this resource.</h4>
        ');
    }
?>