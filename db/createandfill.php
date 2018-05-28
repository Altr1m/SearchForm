<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "careforcancer";
$tblName = "markers";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully. \r\n";
    echo "<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS $tblName(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `logo` VARCHAR( 300 ) NOT NULL ,
    `name` VARCHAR( 80 ) NOT NULL ,
    `description` VARCHAR( 300 ) NOT NULL ,
    `tel` VARCHAR( 80 ) NOT NULL ,
    `email` VARCHAR( 80 ) NOT NULL ,
    `website` VARCHAR( 80 ) NOT NULL ,
    `address` VARCHAR( 80 ) NOT NULL ,
    `lat` FLOAT( 10, 6 ) NOT NULL ,
    `lng` FLOAT( 10, 6 ) NOT NULL ,
    `type` VARCHAR( 30 ) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully. \r\n";
    echo "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO $tblName (name,address,lat,lng,type) VALUES('nam1','hamburg1','53.594731','9.885090','lvl1'),('nam2','hamburg2','53.584731','9.875090','lvl2'),('nam3','hamburg3','53.574731','9.865090','lvl3'),('nam4','hamburg4','53.564731','9.855090','lvl4')";
if ($conn->query($sql) === TRUE) {
    echo "Table filled successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>