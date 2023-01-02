<?php
    header('Content-Type: application/json');
    require_once('../models/seats.php');
    require_once('../models/price.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {
            case 'add':
                if( !is_array($_POST['data']) || (count($_POST['data']) < 3) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                     $data = $_POST['data'];
                     $Result['status'] = 200;
                     $Result['result'] = insertSeat($data['code'], $data['seat_category'], $data['active']);
                }
                break;

            case 'edit':
                if( !is_array($_POST['data']) || (count($_POST['data']) < 3) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                     $data = $_POST['data'];
                     $Result['status'] = 200;
                     $Result['result'] = updateSeat($data['id'], $data['code'], $data['seat_category'], $data['active']);
                }
                break;
                
            case 'delete':
                if( !is_array($_POST['data']) || (count($_POST['data']) != 1) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'invalid Data! Seat Id required';
                }
                else {
                        $data = $_POST['data'];
                        $Result['status'] = 200;
                        $Result['result'] = deleteSeat($data['id']);
                }
                break;

            case 'list':
                $seatList = getAllSeats();
                $price = [
                    'odc' => getLatestPrice('ODC')[0]['price'],
                    'bal' => getLatestPrice('BAL')[0]['price'],
                    'box' => getLatestPrice('BOX')[0]['price'],
                ];
                $Result['status'] = 200;
                $Result['result'] = $seatList;
                $Result['price'] = $price;
                break;

            case 'layout':                
                $newFileName = 'seat_layout';
                if(isset($_FILES['image']['name'])){
                    /* Getting file name */
                    $filename = $_FILES['image']['name'];
                    /* Location */
                    $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
                    $imageFileType = strtolower($imageFileType);
                    $location = "../assets/images/seat_layout/".$newFileName.".".$imageFileType;
                 
                    /* Valid extensions */
                    // $valid_extensions = array("jpg","jpeg","png");
                    $valid_extensions = array("png");
                 
                    $Result['location'] = 0;
                    /* Check file extension */
                    if(in_array(strtolower($imageFileType), $valid_extensions)) {
                        /* Upload file */
                        if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
                            $Result['location'] = $location;
                        }
                        $Result['status'] = 200;
                    }else{
                        $Result['status'] = 500;
                        $Result['error'] = 'Image must be in PNG format.';
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