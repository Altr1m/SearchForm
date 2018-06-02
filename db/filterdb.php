<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "careforcancer";
$tblName = "markers";
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$lat = $_POST["latitude"];
$lng = $_POST["longitude"];
$dst = $_POST["distance"];

$latlng = [
	'lat' => $lat,
	'lng' => $lng,
	'dst' => $dst
];

//print_r($latlng);

$results = array();
if($latlng['dst'] == '0') {
	$havingDistance = "HAVING distance < 30";
} else {
	$havingDistance = "HAVING distance < ".$latlng['dst'];	
}

$sql = "SELECT *, ( 6371 * acos( cos( radians(".$latlng['lat'].") ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(".$latlng['lng'].") ) + sin( radians(".$latlng['lat'].") ) * sin( radians( lat ) ) ) ) AS distance FROM ".$tblName." ".$havingDistance." ORDER BY distance";

//print($sql."\n");

$res = $conn->query($sql);

while ($data = $res->fetch_assoc()) {
    $results[] = $data;
}

$results = json_encode($results);

print_r($results);

$conn->close();