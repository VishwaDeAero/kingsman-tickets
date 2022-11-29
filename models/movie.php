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

// Get Single Movie
function getSingleMovie($id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM movies WHERE id=$id AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get Movies by Category
function getMovies($category_id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM movies WHERE category_id=".$category_id." && deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Movies
function getAllMovies(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM movies WHERE deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Insert New Movie
function insertMovie($name, $category_id, $description, $img_path){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO movies (name, category_id, description, img_path)
        VALUES ('$name', '$category_id', '$description', '$img_path')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        $return_array = [
          "status" => 'Success',
          "id" => $last_id
        ];
        return $return_array;
      } catch(PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
}

// Update a Movie
function updateMovie($id, $data){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    $updateDataQuery = "";
    foreach($data as $key => $value) {
        $updateDataQuery .= "$key = '$value', ";
    }
    $updateDataQuery = rtrim($updateDataQuery, ", ");
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE movies SET $updateDataQuery, updated_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id update successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Delete a Movie (Soft Delete)
function deleteMovie($id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE movies SET deleted_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id deleted successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}
?>