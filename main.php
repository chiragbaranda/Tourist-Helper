<?php
$servername = "localhost";
$username = "000759867";
$password = "19960609";
$dbname = "000759867";

$msg ="";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//if($_POST["id"] && $_POST["name"] &&  $_POST["address"] && $_POST["city"] && $_POST["description"]) {
    $id =  filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
    $name = filter_var($_REQUEST['name'], FILTER_SANITIZE_STRING);
    $address =  filter_var($_REQUEST['address'], FILTER_SANITIZE_STRING);
    $city =  filter_var($_REQUEST['city'], FILTER_SANITIZE_STRING);
    $description =  filter_var($_REQUEST['description'], FILTER_SANITIZE_STRING);
    $msg = "New records created successfully";

//}
//else{
//    $msg = "All field Required!";
//}


// prepare and bind
$stmt = $conn->prepare("INSERT INTO fpresdata(ID, ResName, ResAdd, ResCity, ResDesc) VALUES (?, ?, ?,?,?)");
$stmt->bind_param("isssb", $id,$name,$address,$city,$description);

$stmt->execute();



$stmt->close();
$conn->close();

echo json_encode($msg);
