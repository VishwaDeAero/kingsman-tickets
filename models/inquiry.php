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

// Get Single Inquiry
function getSingleInquiry($id){
  global $servername, $dbname, $username, $password;
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = $conn->prepare("SELECT * FROM inquiry WHERE id=$id AND deleted_at IS NULL");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

// Get All Inquiries
function getAllInquiries(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM inquiry WHERE deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Insert New Inquiry
function insertInquiry($name, $email, $subject, $message){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO inquiry (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return "New record: $last_id created successfully";
      } catch(PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
}

// Update a Inquiry
function updateInquiry($id, $sent){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE inquiry SET mark_read='$sent', updated_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id update successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Delete a Inquiry (Soft Delete)
function deleteInquiry($id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE inquiry SET deleted_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id deleted successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}
?>