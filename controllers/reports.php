<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');
    require_once('../models/booking.php');
    require_once('../models/category.php');
    require_once('../models/screen.php');
    require_once('../models/users.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {

            case 'single':
                if( !isset($_POST['id'])) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! id required';
                }
                else {
                     $id = $_POST['id'];
                     $Result['status'] = 200;
                     $Result['result'] = getSingleNews($id);
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