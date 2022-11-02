<?php
    header('Content-Type: application/json');
    require_once('../models/movie.php');

    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'list':
                $Result['status'] = 200;
                break;

            case 'add':                
                $name = $_POST['name'];
                $newFileName = str_replace(" ", "_", $_POST['name']);
                $category_id = $_POST['category_id'];
                $description = str_replace("'", "''", $_POST['description']);
                if(isset($_FILES['image']['name'])){
                    /* Getting file name */
                    $filename = $_FILES['image']['name'];
                    /* Location */
                    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
                    $imageFileType = strtolower($imageFileType);
                    $location = "../assets/images/movies/".$newFileName.".".$imageFileType;
                 
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
                        $Result['result'] = insertMovie($name, $category_id, $description, ($newFileName.'.'.$imageFileType));
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