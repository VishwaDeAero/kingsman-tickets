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

// Check User Login
function getLoggedUser($usrname, $passwrd){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $encPassword = md5($passwrd);
        $sql = $conn->prepare("SELECT * FROM users WHERE username='$usrname' AND password='$encPassword' AND active=1 AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get Single User
function getSingleUser($id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM users WHERE id=$id");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// find User by username
function findUser($usrname){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM users WHERE username='$usrname' AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Users by Current Month
function getAllUsersByMonth(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM users WHERE user_type='user' AND MONTH(created_at) = MONTH(CURRENT_DATE()) AND YEAR(created_at) = YEAR(CURRENT_DATE()) AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Users by User Type
function getAllUsersByType($type){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM users WHERE user_type='$type' AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Users
function getAllUsers(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM users WHERE deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Users
function getAllUsersByRange($startdate, $enddate){
  global $servername, $dbname, $username, $password;
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = $conn->prepare("SELECT * FROM users WHERE deleted_at IS NULL AND (created_at BETWEEN '$startdate' AND '$enddate')");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

// Insert New User
function insertUser( $first_name, $last_name, $nic, $gender, $dob, $contact_no, $email, $usrname, $passwrd, $user_type, $active ){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (first_name, last_name, nic, gender, dob, contact_no, email, username, password, user_type, active)
        VALUES ('$first_name', '$last_name', '$nic', '$gender', '$dob', '$contact_no', '$email', '$usrname', '$passwrd', '$user_type', '$active')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        $return_array = [
          "status" => 'Success',
          "id" => $last_id
        ];
        return $return_array;
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Update a User
function updateUser($id, $data){
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
        $sql = $conn->prepare("UPDATE users SET $updateDataQuery, updated_at='$date' WHERE id=$id");
        $sql->execute();
        return "User: $id information updated successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Delete a User (Soft Delete)
function deleteUser($id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE users SET deleted_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id deleted successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}
?>