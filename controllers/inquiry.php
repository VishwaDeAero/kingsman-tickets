<?php
    header('Content-Type: application/json');
    require_once('../models/inquiry.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'list':
                $inquiryList = getAllInquiries();
                $tableArray = [];
                foreach ($inquiryList as $key => $value) {
                    $tableArray[$key]['id'] = $value['id'];
                    $tableArray[$key]['name'] = $value['name'];
                    $tableArray[$key]['email'] = $value['email'];
                    $tableArray[$key]['subject'] = $value['subject'];
                    $tableArray[$key]['description'] = $value['message'];
                    $tableArray[$key]['created_at'] = $value['created_at'];
                    $tableArray[$key]['action_buttons'] = '<a class="btn py-0 text-success col-auto" data-id="'.$value['id'].'" title="edit"><i class="fa-solid fa-check"></i></a><a class="btn py-0 text-danger col-auto" data-id="'.$value['id'].'" title="delete"><i class="fa-solid fa-trash"></i></a>';
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