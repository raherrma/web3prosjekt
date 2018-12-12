<?php
    require_once "../db.php";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT id, title, subtitle, img, content, published FROM blogposts");
        $stmt->execute();

        // set the resulting array to associative
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        echo $json;
        return $json;
    }
    catch(PDOException $e) {
        $error = json_encode($e->getMessage());
    }
?>
