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
                    $tableArray[$key]['action'] = "<a class='btn py-0 text-primary col-auto' data-id='".$value['id']."' data-set='".json_encode($value)."' data-bs-toggle='modal' data-bs-target='#viewInquiryModal' title='edit'><i class='fa fa-envelope-open'></i></a><a class='btn py-0 text-danger col-auto delete-inquiry-btn' data-id='".$value['id']."' title='delete'><i class='fa-solid fa-trash'></i></a>";
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

            case 'delete':
                if( !isset($_POST['id']) ) {
                    $Result['status'] = 400;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                    $inquiry_id = $_POST["id"];
                    $Result['status'] = 200;
                    $Result["result"] = deleteInquiry($inquiry_id);
                }
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>