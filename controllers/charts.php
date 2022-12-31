<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/screen.php');
    require_once('../models/users.php');
    require_once('../models/category.php');
    require_once('../models/booking.php');
    require_once('../models/reservation.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            
            case 'latestmovies':
                $movieList = getLatestMovies(12);
                $movies = [];
                foreach ($movieList as $key => $value) {
                    $movie_info = [];
                    $movie_info['movie'] = $value;
                    $category_id = $value['category_id'];
                    $movie_info['category'] = getSingleCategory($category_id);
                    array_push($movies, $movie_info);
                }
                $Result['status'] = 200;
                $Result['result'] = $movies;
                break;
            
            case 'stats':
                $bookings = getBookingbyMonth();
                $cancellations = getCancellationsbyMonth();
                $newusers = getAllUsersByMonth();
                $userlist = getAllUsersByType('user');
                $screens = getMovieScreensByMonth();
                $Result['status'] = 200;
                $Result['bookings'] = $bookings;
                $Result['cancellations'] = $cancellations;
                $Result['newusers'] = $newusers;
                $Result['users'] = $userlist;
                $Result['screens'] = $screens;
                break;
            
            case 'latestnews':
                $Result['status'] = 200;
                $Result['result'] = $newsList;
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>