<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/category.php');
    require_once('../models/news.php');


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
            
            case 'latestnews':
                $newsList = getLatestNews(6);
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