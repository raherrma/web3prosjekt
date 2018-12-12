<?php
require_once 'createdb.php'

echo "<form name=insert_artist>"
echo "<insert type=text name='fname' placeholder='Artist Firstname' required>";
echo "<insert type=text name='lname' placeholder='Artist Lastname' required>";
echo "<insert type=number name='tickets' placeholder='Maximum number of tickets for sale' required>";
echo "<insert type=number name='price' placeholder='Price per ticket' required>";
echo "<insert button type='submit' name='submitArtist'"



if (isset($_POST["submitArtist"]) && !empty($_POST["submitArtist"])) {
  // prepare and bind
  // prepare and bind

  $stmt = $conn->prepare("INSERT INTO artists (firstname, lastname, tickets, price)
                         VALUES ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["tickets"]."','".$_POST["price"]."')");

  // set parameters and execute
  $stmt->execute();
?>
