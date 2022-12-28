<?php
    header('Content-Type: application/json');
    require_once('../models/seats.php');
    require_once('../models/screen.php');
    require_once('../models/reservation.php');
    require_once('../models/booking.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {

            case 'datelist':
                if( !isset($_POST['id'])) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! id required';
                }
                else {
                     $id = $_POST['id'];
                     $Result['status'] = 200;
                     $Result['result'] = getMovieScreensDates($id);
                }
                break;

            case 'screenlist':
                if( !isset($_POST['id']) && !isset($_POST['date']) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! id, date required';
                }
                else {
                     $id = $_POST['id'];
                     $date = $_POST['date'];
                     $Result['status'] = 200;
                     $Result['result'] = getMovieScreensByDate($id, $date);
                }
                break;

            case 'seatslist':
                if( !isset($_POST['id']) && !isset($_POST['screen']) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! id, screen required';
                }
                else {
                     $id = $_POST['id'];
                     $screen = $_POST['screen'];
                     $Result['status'] = 200;
                     //  Get All Active Seats
                     $AllSeats = getAllActiveSeats();
                     $screenReservations = getAllReservationsByScreen($screen);
                     $BookedSeats = [];
                     //  Get Booked Seats
                     foreach ($screenReservations as $key => $value) {
                        $bookings = getAllBookingsByReservation($value['id']);
                        foreach ($bookings as $bkey => $booking) {
                            $seatcode = getSingleSeat($bookings[$bkey]['seat_id']);
                            array_push($BookedSeats, $seatcode[0]);
                        }
                     }
                     $AvailableSeats = [];
                     //  Get Available Seats
                     foreach ($AllSeats as $key => $value) {
                        if (!in_array($value, $BookedSeats))
                        {
                            array_push($AvailableSeats, $value) ;
                        }
                     }
                     $Result['result'] = $AvailableSeats;
                }
                break;

            case 'add':
                if( !isset($_POST['movie_id']) && !isset($_POST['screen_id']) && !isset($_POST['user_id']) && !isset($_POST['seats_id']) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! movie_id, screen_id, user_id, seats_id required';
                }
                else {
                    $movie_id = $_POST['movie_id'];
                    $screen_id = $_POST['screen_id'];
                    $user_id = $_POST['user_id'];
                    $seats_id = $_POST['seats_id'];
                    $seats_id = explode(",",$seats_id);
                    $paid = 0;
                    $status = 'Pending';
                    $booked = [];
                    $old_reservations = getAllReservationsByScreen($screen_id);
                    foreach ($old_reservations as $key => $reservation) {
                        $seats = getAllBookingsByReservation($reservation['id']);
                        foreach ($seats as $skey => $seat) {
                            $seatcode = getSingleSeat($seat['seat_id']);
                            array_push($booked, $seatcode[0]['id']);
                        }
                    }
                    $already_booked = array_intersect($booked, $seats_id);
                    if($already_booked){
                        $Result['status'] = 200;
                        $Result['error'] = "Your Selected Seats Already Booked";
                    }else{
                        $reservation_id = insertReservation($user_id, $movie_id, $screen_id, $paid, $status);
                        foreach ($seats_id as $key => $seat_id) {
                            insertBooking($reservation_id, $seat_id);
                        }
                        $Result['status'] = 200;
                        $Result['result'] = "Reservation Completed Successfully";
                    }
                }
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>