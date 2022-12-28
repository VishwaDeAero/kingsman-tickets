<?php
    header('Content-Type: application/json');
    require_once('../models/seats.php');
    require_once('../models/screen.php');


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
                     $AllSeats = getAllActiveSeats();
                     $Result['result'] = $AllSeats;
                }
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>