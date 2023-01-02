<?php
    header('Content-Type: application/json');
    require_once('../models/price.php');
    require_once('../models/movie.php');
    require_once('../models/screen.php');
    require_once('../models/category.php');


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
                     $movieData = getSingleMovie($id);
                     $categoryData = getSingleCategory($movieData[0]['category_id']);
                     $price = [
                        'odc' => getLatestPrice('ODC')[0]['price'],
                        'bal' => getLatestPrice('BAL')[0]['price'],
                        'box' => getLatestPrice('BOX')[0]['price'],
                    ];
                     $Result['result'] = [
                         'movie' => $movieData,
                         'category' => $categoryData,
                         'price' => $price
                     ];
                }
                break;
                
            case 'list':
                $screenList = getAllScreens();
                $tableArray = [];
                foreach ($screenList as $key => $value) {
                    $movie_id = $value['movie_id'];
                    $movie_info = getSingleMovie($movie_id);
                    $category_id = $movie_info[0]['category_id'];
                    $category_info = getSingleCategory($category_id);
                    $tableArray[$key]['movie_id'] = $movie_id;
                    $tableArray[$key]['movie_name'] = $movie_info[0]['name'];
                    $tableArray[$key]['movie_description'] = $movie_info[0]['description'];
                    $tableArray[$key]['movie_category'] = $category_info[0]['name'];
                    $tableArray[$key]['movie_screen_id'] = $value['id'];
                    $tableArray[$key]['movie_screen_date'] = $value['date'];
                    $tableArray[$key]['movie_screen_time'] = $value['time'];
                    $tableArray[$key]['movie_active'] = $value['active'];
                    $checked = ($value['active'])?'checked':'';
                    $tableArray[$key]['active_switch'] = '<div class="form-check form-switch"><input class="form-check-input" data-id="'.$value['id'].'" value="'.$value['active'].'" type="checkbox" id="activeSwitch" '.$checked.'></div>';
                    $tableArray[$key]['action_buttons'] = '<a class="btn py-0 text-warning col-auto" data-id="'.$value['id'].'" title="edit"><i class="fa-solid fa-pen"></i></a><a class="btn py-0 text-danger col-auto" data-id="'.$value['id'].'" title="delete"><i class="fa-solid fa-trash"></i></a>';
                }
                $Result['status'] = 200;
                $Result['result'] = $tableArray;
                break;

            case 'add':                
                $name = $_POST['name'];
                $newFileName = str_replace(" ", "_", $_POST['name']);
                $category_id = $_POST['category_id'];
                $description = str_replace("'", "''", $_POST['description']);
                $screentimes = [];
                if($_POST['screens']){
                    $screens = explode(",",$_POST['screens']);
                    foreach ($screens as $key => $value) {
                        $array = [
                            "date" => date('Y-m-d',strtotime($value)),
                            "time" => date('h:i:s',strtotime($value))
                        ];
                        array_push($screentimes, $array);
                    }
                }
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
                        $Result['movie_result'] = insertMovie($name, $category_id, $description, ($newFileName.'.'.$imageFileType));
                        $screensInsert = [];
                        foreach ($screentimes as $key => $value) {
                            $screenResult = insertScreen($Result['movie_result']['id'], $value['date'], $value['time']);
                        }
                        $Result['test'] = $screentimes;
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