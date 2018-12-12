<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dsdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dsdb", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      null;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
