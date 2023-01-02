<?php
    header('Content-Type: application/json');
    require_once('../models/reservation.php');
    require_once('../models/booking.php');
    require_once('../models/price.php');
    require_once('../models/movie.php');
    require_once('../models/screen.php');
    require_once('../models/seats.php');
    require_once('../models/users.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'list':
                $reservationList = getAllReservations();
                $tableArray = [];
                foreach ($reservationList as $key => $value) {
                    $tableArray[$key]['id'] = $value['id'];
                    $user = getSingleUser($value['user_id'])[0];
                    $movie = getSingleMovie($value['movie_id'])[0];
                    $screen = getMovieScreens($value['screen_id'])[0];
                    $seatids = getAllBookingsByReservation($value['id']);
                    $seats = "";
                    $price = 0;
                    foreach ($seatids as $skey => $seat) {
                        $seat_info = getSingleSeat($seat['seat_id'])[0];
                        $price += (float) getRelatedPrice($seat_info['seat_category'], $value['created_at'])[0]['price'];
                        $seats .= '<span class="mx-1 p-1 border rounded border-primary">'.$seat_info['code'].'</span>';
                    }
                    $tableArray[$key]['customer'] = $user['first_name']." ".$user['last_name'];
                    $tableArray[$key]['movie'] = $movie['name'];
                    $tableArray[$key]['date'] = $screen['date'];
                    $tableArray[$key]['time'] = $screen['time'];
                    $tableArray[$key]['seats'] = $seats;
                    $tableArray[$key]['price'] = "Rs.".(float)$price;
                    if($seatids){
                        $tableArray[$key]['action'] = '<a class="btn btn-sm btn-primary text-light col-auto fw-bold" data-id="'.$value['id'].'" title="Mark Paid"><i class="fa-solid fa-dollar me-1"></i>Mark as Paid</a>';
                    }else{
                        $tableArray[$key]['action'] = '<span class="text-danger fw-bold col-auto">Cancelled</span>';
                    }
                }
                $Result['status'] = 200;
                $Result['result'] = $tableArray;
                break;

            case 'add':                
                $name = $_POST['data']['name'];
                $email = $_POST['data']['email'];
                $subject = $_POST['data']['subject'];
                $message = $_POST['data']['message'];
                
                $Result['status'] = 200;
                $Result['result'] = insertInquiry($name, $email, $subject, $message);
               break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>