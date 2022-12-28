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

// Get Single Booking
function getSingleBooking($id){
  global $servername, $dbname, $username, $password;
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = $conn->prepare("SELECT * FROM bookings WHERE id=$id AND deleted_at IS NULL");
      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

// Get All Bookings
function getAllBookings(){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT * FROM bookings WHERE deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Get All Bookings by Reservation
function getAllBookingsByReservation($reservation_id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("SELECT seat_id FROM bookings WHERE reservation_id=$reservation_id AND deleted_at IS NULL");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Insert New Booking
function insertBooking($res_id, $seat_id){
    global $servername, $dbname, $username, $password;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO bookings (reservation_id, seat_id)
        VALUES ('$res_id', '$seat_id')";
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return "New record: $last_id created successfully";
      } catch(PDOException $e) {
        return $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
}

// Update a Booking
function updateBooking($id, $res_id, $seat_id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE bookings SET reservation_id='$res_id', seat_id='$seat_id', updated_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id update successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}

// Delete a Booking (Soft Delete)
function deleteBooking($id){
    global $servername, $dbname, $username, $password;
    $date = date('Y-m-d H:i:s');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("UPDATE bookings SET deleted_at='$date' WHERE id=$id");
        $sql->execute();
        return "Record: $id deleted successfully";
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
      $conn = null;
}
?>