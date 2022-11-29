<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/screen.php');
    require_once('../models/category.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'listcategories':
                $categoryList = getAllCategories();
                $Result['status'] = 200;
                $Result['result'] = $categoryList;
                break;
            case 'listmovies':
                $category_id = $_POST['category_id'];
                $movieList = getMovies($category_id);
                $Result['status'] = 200;
                $Result['result'] = $movieList;
                break;
            case 'list':
                $screenList = getAllScreens();
                $Result['status'] = 200;
                $Result['result'] = $tableArray;
                break;

            case 'add':                
                $name = $_POST['name'];
               break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>