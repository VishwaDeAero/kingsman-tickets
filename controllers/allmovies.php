<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/screen.php');
    require_once('../models/category.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            
            case 'allmovies':
                $categoryList = getAllCategories();
                $categories = [];
                foreach ($categoryList as $key => $value) {
                    $cat_info = [];
                    $cat_info['id'] = $value['id'];
                    $cat_info['name'] = $value['name'];
                    $cat_info['movies'] = getMovies( $value['id']);
                    array_push($categories, $cat_info);
                }
                $Result['status'] = 200;
                $Result['result'] = $categories;
                break;

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

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>