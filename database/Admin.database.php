<?php
    $SERVER = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DATABASE = "nfc_data";

    $conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

    header('Content-Type : application/json');

    if(!$conn) {
        die("Connection Error: " . mysqli_connect_error());
    }
    
    //prevent direct access to the pages
    define('SECURE_ACCESS', true);
    include './Admin.database.php';
    //include './dashboard/dashboard.php';
    include '../dashboard/';

    if(!defined('SECURE_ACCESS')) {
        die('
            <h1>Direct access not permitted.</h1>
            <h4>You dont have permission to access this resource.</h4>
        ');
    }

    $input = json_decode(file_get_contents("php://input"), true);

    if($_SERVER('REQUEST_METHOD') === "DELETE") {
        
    }

    if($_SERVER('REQUEST_METHOD') === "PUT") {

    }
?>