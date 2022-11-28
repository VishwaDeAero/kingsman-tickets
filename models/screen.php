<?php
require_once('../env.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    return "Connection failed: " . $e->getMessage();
  }
$conn = null;

// Get Movie Screens
function getMovieScreens($movie_id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM screens WHERE movie_id=$movie_id AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Screens
function getAllScreens(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM screens WHERE deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Insert New Screen
function insertScreen($movie_id, $date, $time){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO screens (movie_id, date, time, active)
        VALUES ('$movie_id', '$date', '$time', '1')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return "New record: $last_id created successfully";
      } catch(PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
}

// Delete a Screen (Soft Delete)
function deleteScreen($id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE screens SET deleted_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id deleted successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}
?>