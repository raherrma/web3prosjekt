<?php 

class Post {
    public function index() {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=dsdb", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT title, subtitle, img, content FROM blogposts");
            $stmt->execute();

            // set the resulting array to associative
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $jsonEncode = json_encode($results);
            return $jsonEncode;
        }
        catch(PDOException $e) {
            $error = json_encode($e->getMessage());
        }
    }

    public function save($request){
        var_dump($request->title);
        return $request->title;
       $servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDBPDO";

try {
    $conn = new PDO("mysql:host=localhost;dbname=dsd", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO blogposts (title, subtitle, img, content)
    VALUES ('John', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
    }
}