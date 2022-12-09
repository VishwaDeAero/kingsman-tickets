<?php
    header('Content-Type: application/json');
    require_once('../models/news.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
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

            case 'add':                
                $title = $_POST['title'];
                $newFileName = str_replace(" ", "_", $_POST['title']);
                $description = str_replace("'", "''", $_POST['description']);
                if(isset($_FILES['image']['name'])){
                    /* Getting file name */
                    $filename = $_FILES['image']['name'];
                    /* Location */
                    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
                    $imageFileType = strtolower($imageFileType);
                    $location = "../assets/images/news/".$newFileName.".".$imageFileType;
                 
                    /* Valid extensions */
                    $valid_extensions = array("jpg","jpeg","png");
                 
                    $Result['location'] = 0;
                    /* Check file extension */
                    if(in_array(strtolower($imageFileType), $valid_extensions)) {
                        /* Upload file */
                        if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
                            $Result['location'] = $location;
                        }
                        $Result['status'] = 200;
                        $Result['result'] = insertNews($title, $description, ($newFileName.'.'.$imageFileType));
                    }else{
                        $Result['status'] = 500;
                        $Result['error'] = 'Image Type Not Supported';
                    }
                }
               break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>