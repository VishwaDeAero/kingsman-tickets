<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/reservation.php');
    require_once('../models/booking.php');
    require_once('../models/category.php');
    require_once('../models/screen.php');
    require_once('../models/price.php');
    require_once('../models/seats.php');
    require_once('../models/users.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {

            case 'tickets':
                if( !isset($_POST['startdate']) && !isset($_POST['enddate'])) {
                    $Result['status'] = 400;
                    $Result['error'] = 'invalid Data! Date range required';
                }
                else {
                    $reservationList = getReservationsByRange($_POST['startdate'], $_POST['enddate']);
                    $tableArray = [];
                    if($reservationList){
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
                                if($value['paid'] == 1){
                                    $tableArray[$key]['action'] = '<span class="text-success fw-bold col-auto">Paid</span>';
                                }else{
                                    $tableArray[$key]['action'] = '<span class="text-warning fw-bold col-auto">Not Paid</span>';
                                }
                            }else{
                                $tableArray[$key]['action'] = '<span class="text-danger fw-bold col-auto">Cancelled</span>';
                            }
                        }
                    }
                    $Result['status'] = 200;
                    $Result['result'] = $tableArray;
                }
                break;

            case 'users':
                if( !isset($_POST['startdate']) && !isset($_POST['enddate'])) {
                    $Result['status'] = 400;
                    $Result['error'] = 'invalid Data! Date range required';
                } else {
                    $userlist = getAllUsersByRange($_POST['startdate'], $_POST['enddate']);
                    $tableArray = [];
                    if($userlist){
                        foreach ($userlist as $key => $value) {
                            $tableArray[$key]['id'] = $value['id'];
                            $tableArray[$key]['name'] = $value['first_name'].' '.$value['last_name'];
                            $tableArray[$key]['username'] = $value['username'];
                            $tableArray[$key]['user_type'] = $value['user_type'];
                            $tableArray[$key]['nic'] = $value['nic'];
                            $tableArray[$key]['gender'] = $value['gender'];
                            $tableArray[$key]['dob'] = $value['dob'];
                            $tableArray[$key]['contact_no'] = $value['contact_no'];
                            $tableArray[$key]['email'] = $value['email'];
                        }
                    }
                    $Result['status'] = 200;
                    $Result['result'] = $tableArray;
                }
                break;

            case 'list':
                $newsList = getAllNews();
                $tableArray = [];
                foreach ($newsList as $key => $value) {
                    $tableArray[$key]['news_id'] = $value['id'];
                    $tableArray[$key]['news_title'] = $value['title'];
                    $tableArray[$key]['news_description'] = $value['description'];
                    $tableArray[$key]['created_date'] = $value['created_at'];
                    $tableArray[$key]['action_buttons'] = '<a class="btn py-0 text-warning col-auto" data-id="'.$value['id'].'" title="edit"><i class="fa-solid fa-pen"></i></a><a class="btn py-0 text-danger col-auto" data-id="'.$value['id'].'" title="delete"><i class="fa-solid fa-trash"></i></a>';
                }
                $Result['status'] = 200;
                $Result['result'] = $tableArray;
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>