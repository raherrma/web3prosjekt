<?php
//Defining the database connection and setting $conn to run the connection function.
DEFINE('HOST', 'localhost');
DEFINE('USER', 'root');
DEFINE('PASSWORD', '');
DEFINE('DATABASE', 'drammendb');

function DB()
{
    try {
        $conn = new PDO('mysql:host='.HOST.';dbname='.DATABASE.'', USER, PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
        die();
    }
}

$conn = DB();


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE artists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    tickets INT(50),
    price DECIMAL(5,2),
    reg_date TIMESTAMP
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "$sql successfully";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // sql to create table
    $sql = "CREATE TABLE cart (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_id INT(6) NOT NULL,
    ticket_no INT(6) UNSIGNED AUTO_INCREMENT,
    price DECIMAL(5,2),
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "$sql successfully";
    }
    catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
