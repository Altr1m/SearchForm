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
    `logo` VARCHAR( 100 ) NOT NULL ,
    `image` VARCHAR( 100 ) NOT NULL ,
    `mapicon` VARCHAR( 100 ) NOT NULL ,
    `name` VARCHAR( 50 ) NOT NULL ,
    `description` VARCHAR( 300 ) NOT NULL ,
    `tel` VARCHAR( 50 ) NOT NULL ,
    `email` VARCHAR( 50 ) NOT NULL ,
    `website` VARCHAR( 50 ) NOT NULL ,
    `address` VARCHAR( 100 ) NOT NULL ,
    `lat` FLOAT( 10, 6 ) NOT NULL ,
    `lng` FLOAT( 10, 6 ) NOT NULL ,
    `type` VARCHAR( 50 ) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table created successfully. \r\n";
    echo "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO $tblName (logo, image, mapicon, name, description, tel, email, website, address, lat, lng, type) 
VALUES
('siegel_gold@2x.png','image.jpg','pin_gold.png','Dr. Med. Praxis fur Lorem ipsum 1','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Hamburg, Germany','53.594730','9.885090','lvl1'),
('siegel_bronze@2x.png','image.jpg','pin_bronze.png','Dr. Med. Praxis fur Lorem ipsum 2','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Hamburg, Germany','53.554730','9.855090','lvl2'),
('siegel_silber@2x.png','image.jpg','pin_silber.png','Dr. Med. Praxis fur Lorem ipsum 3','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Hamburg, Germany','53.514730','9.815090','lvl3'),
('siegel_gold@2x.png','image.jpg','pin_gold.png','Dr. Med. Praxis fur Lorem ipsum 4','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Hamburg, Germany','53.414730','9.415090','lvl4'),
('siegel_gold@2x.png','image.jpg','pin_gold.png','Dr. Med. Praxis fur Lorem ipsum 5','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Hamburg, Germany','53.541196','9.984025','lvl5'),
('siegel_gold@2x.png','image.jpg','pin_gold.png','Dr. Med. Praxis fur Lorem ipsum 6','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Berlin, Germany','52.541521','13.279337','lvl6'),
('siegel_gold@2x.png','image.jpg','pin_gold.png','Dr. Med. Praxis fur Lorem ipsum 7','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Berlin, Germany','52.514476','13.242741','lvl7'),
('siegel_bronze@2x.png','image.jpg','pin_bronze.png','Dr. Med. Praxis fur Lorem ipsum 8','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Berlin, Germany','52.507924','13.335856','lvl8'),
('siegel_silber@2x.png','image.jpg','pin_silber.png','Dr. Med. Praxis fur Lorem ipsum 9','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Berlin, Germany','52.507924','13.335856','lvl9'),
('siegel_bronze@2x.png','image.jpg','pin_bronze.png','Dr. Med. Praxis fur Lorem ipsum 10','Lorem Ipsum has been the industrys standard dummy text ever since the 1500s','+49 123 456789','email@email.com','www.test.com','Berlin, Germany','52.477252','13.392149','lvl10')";
if ($conn->query($sql) === TRUE) {
    echo "Table filled successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>