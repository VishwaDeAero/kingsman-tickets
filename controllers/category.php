<?php
    header('Content-Type: application/json');
    require_once('../models/category.php');

    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'list':
                $Result['status'] = 200;
                $Result['result'] = getAllCategories();
                break;

            case 'add':
               if( !is_array($_POST['data']) || (count($_POST['data']) != 1) ) {
                   $Result['status'] = 500;
                   $Result['error'] = 'invalid Data! name required';
               }
               else {
                    $data = $_POST['data'];
                    $same_category = findCategory($data['name']);
                    if($same_category){
                        $Result['status'] = 400;
                        $Result['error'] = 'Same Category Name Exist!';
                    }else{ 
                        $Result['status'] = 200;
                        $Result['result'] = insertCategory($data['name']);
                    }
               }
               break;

            case 'edit':
               if( !is_array($_POST['data']) || (count($_POST['data']) != 2) ) {
                   $Result['status'] = 500;
                   $Result['error'] = 'invalid Data! id,name required';
               }
               else {
                    $data = $_POST['data'];
                    $Result['status'] = 200;
                    $Result['result'] = updateCategory($data['id'], $data['name']);
               }
               break;

            case 'delete':
               if( !is_array($_POST['data']) || (count($_POST['data']) != 1) ) {
                   $Result['status'] = 500;
                   $Result['error'] = 'invalid Data! id required';
               }
               else {
                    $data = $_POST['data'];
                    $Result['status'] = 200;
                    $Result['result'] = deleteCategory($data['id']);
               }
               break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>