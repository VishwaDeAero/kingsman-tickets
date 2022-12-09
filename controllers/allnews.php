<?php
    header('Content-Type: application/json');
    require_once('../models/news.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            
            case 'allnews':
                $newslist = getAllNews();
                $Result['status'] = 200;
                $Result['result'] = $newslist;
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>