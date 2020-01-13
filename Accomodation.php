<?php
$servername = "localhost";
$username = "000759867";
$password = "19960609";
$dbname = "000759867";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM fpaccomodation";

$result = $conn->query($sql);
$accomodation = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($accomodation,$row);
    }
} else {
    echo "0 results";
}

echo json_encode($accomodation);
