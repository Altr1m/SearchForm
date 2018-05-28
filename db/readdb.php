<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "careforcancer";
$tblName = "markers";
$docs[] = "";
/*$searchdok = $_GET['mapinput'];*/

define("API_KEY","AIzaSyB9ZRlVlsODKlPKvWz5Bv0Y8b4gsmY3qZw");

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$docs = array();
$res=$conn->query("SELECT * FROM $tblName");

while ($data = $res->fetch_assoc()) {
    $docs[] = $data;
}

$docs = json_encode($docs);

$conn->close();

?>