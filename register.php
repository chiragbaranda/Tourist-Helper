<?php

try
{
    $dbh = new PDO("mysql:host=localhost;dbname=000759867", "000759867", "19960609");
    echo "Database connection Successful!!";

}
catch (Exception $e)
{
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}


$link_address ="index.html";
$id = rtrim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_SPECIAL_CHARS));
$name = rtrim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS));
$desc = rtrim(filter_input(INPUT_POST, "desc", FILTER_SANITIZE_SPECIAL_CHARS));
$add = rtrim(filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS));
$city = rtrim(filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS));
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($_POST['insert']))
    {
        $sql= "INSERT INTO `fpresdata`(`ID`, `ResName`, `ResAdd`, `ResCity`, `ResDesc`) VALUES ('$id','$name','$desc','$add','$city')";
    }
}

$stmt = $dbh->prepare($sql);
$success = $stmt->execute();

if ($success)
{
    echo "<p>successfull query run</p>";
//    echo "<p> $sql </p>";
    echo "<p> {$stmt->rowCount()} rows were affected by your  query.</p>";

}
else
{ echo "<p> Fail, Query Run</p>";
}

echo "<h1>Thank you for feedback </h1>";
echo "<a href='".$link_address."'>HOMEPAGE</a>";

