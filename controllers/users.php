<?php
    header('Content-Type: application/json');
    require_once('../models/users.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {

            case 'login':
                if( !isset($_POST['username']) || !isset($_POST['password']) ){
                    $Result['status'] = 500;
                    $Result['error'] = 'Username and Password Required!';
                }else{
                    $usrname = $_POST['username'];
                    $passwrd = $_POST['password'];
                    $user = getLoggedUser( $usrname, $passwrd );
                    if($user){
                        session_start();
                        $_SESSION["user"] = $user[0];
                        $Result['status'] = 200;
                        $Result['result'] = $_SESSION["user"];
                    }else{
                        $Result['status'] = 500;
                        $Result['error'] = 'Incorrect Username or Password. Please try again';
                    }
                }
                break;

            case 'userlist':
                $userlist = getAllUsersByType('user');
                $tableArray = [];
                if(!$userlist){
                    $Result['status'] = 500;
                    $Result['error'] = "No Records";
                }
                else{
                    foreach ($userlist as $key => $value) {
                        $tableArray[$key]['id'] = $value['id'];
                        $tableArray[$key]['name'] = $value['first_name'].' '.$value['last_name'];
                        $tableArray[$key]['username'] = $value['username'];
                        $tableArray[$key]['nic'] = $value['nic'];
                        $tableArray[$key]['gender'] = $value['gender'];
                        $tableArray[$key]['dob'] = $value['dob'];
                        $tableArray[$key]['contact_no'] = $value['contact_no'];
                        $tableArray[$key]['email'] = $value['email'];
                        $checked = ($value['active'])?'checked':'';
                        $tableArray[$key]['active'] = '<div class="form-check form-switch"><input class="form-check-input" data-id="'.$value['id'].'" value="'.$value['active'].'" type="checkbox" id="activeSwitch" '.$checked.'></div>';
                        $tableArray[$key]['action'] = '<a class="btn py-0 text-warning col-auto" data-id="'.$value['id'].'" title="edit"><i class="fa-solid fa-pen"></i></a><a class="btn py-0 text-danger col-auto" data-id="'.$value['id'].'" title="delete"><i class="fa-solid fa-trash"></i></a>';
                    }
                    $Result['status'] = 200;
                    $Result['result'] = $tableArray;
                }
                break;

            case 'stafflist':
                $stafflist = getAllUsersByType('staff');
                $tableArray = [];
                if(!$stafflist){
                    $Result['status'] = 500;
                    $Result['error'] = "No Records";
                }
                else{
                    foreach ($stafflist as $key => $value) {
                        $tableArray[$key]['id'] = $value['id'];
                        $tableArray[$key]['name'] = $value['first_name'].' '.$value['last_name'];
                        $tableArray[$key]['username'] = $value['username'];
                        $tableArray[$key]['nic'] = $value['nic'];
                        $tableArray[$key]['gender'] = $value['gender'];
                        $tableArray[$key]['dob'] = $value['dob'];
                        $tableArray[$key]['contact_no'] = $value['contact_no'];
                        $tableArray[$key]['email'] = $value['email'];
                        $checked = ($value['active'])?'checked':'';
                        $tableArray[$key]['active'] = '<div class="form-check form-switch"><input class="form-check-input" data-id="'.$value['id'].'" value="'.$value['active'].'" type="checkbox" id="activeSwitch" '.$checked.'></div>';
                        $tableArray[$key]['action'] = '<a class="btn py-0 text-warning col-auto" data-id="'.$value['id'].'" title="edit"><i class="fa-solid fa-pen"></i></a><a class="btn py-0 text-danger col-auto" data-id="'.$value['id'].'" title="delete"><i class="fa-solid fa-trash"></i></a>';
                    }
                    $Result['status'] = 200;
                    $Result['result'] = $tableArray;
                }
                break;

            case 'add':
                if( !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['dob']) || !isset($_POST['user_type']) || !isset($_POST['active']) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                     $first_name = $_POST['firstname'];
                     $last_name = $_POST['lastname'];
                     $usrname = $_POST['username'];
                     $passwrd = md5($_POST['password']);
                     $nic = $_POST['nic'];
                     $contact_no = $_POST['contact_no'];
                     $email = $_POST['email'];
                     $gender = $_POST['gender'];
                     $dob = $_POST['dob'];
                     $user_type = $_POST['user_type'];
                     $active = $_POST['active'];
                     $Result['status'] = 200;
                     $Result['result'] = insertUser( $first_name, $last_name, $nic, $gender, $dob, $contact_no, $email, $usrname, $passwrd, $user_type, $active );
                }
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>