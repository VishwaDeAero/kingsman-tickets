<?php
    header('Content-Type: application/json');
    require_once('../models/users.php');


    $Result = array();

    if( !isset($_POST['function']) ) { $Result['error'] = 'No function name!'; }

    if( !isset($Result['error']) ) {

        switch($_POST['function']) {

            case 'password':
                if( !isset($_POST['id']) || !isset($_POST['oldPassword']) || !isset($_POST['updatePassword']) ){
                    $Result['status'] = 500;
                    $Result['error'] = 'User ID and Old/New Passwords Required!';
                }else{
                    if(!isset($_SESSION["user"])){
                        session_start();
                    }
                    if($_SESSION["user"]){
                        if($_SESSION["user"]['password'] == md5($_POST['oldPassword'])){
                            $Result['status'] = 200;
                            $data = [
                                'password' => md5($_POST['updatePassword'])
                            ];
                            $Result["result"] = updateUser($_POST["id"],$data);
                        } else{
                            $Result['status'] = 200;
                            $Result['error'] = 'Old Password Mismatch';
                        }
                    }else{
                        $Result['status'] = 400;
                        $Result['error'] = 'Please login & try again';
                    }
                }
                break;

            case 'login':
                if( !isset($_POST['username']) || !isset($_POST['password']) ){
                    $Result['status'] = 400;
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
                        $Result['status'] = 400;
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
                        $tableArray[$key]['action'] = "<a class='btn py-0 text-warning col-auto' data-id='".$value['id']."' data-set='".json_encode($value)."' data-bs-toggle='modal' data-bs-target='#updateUserFormModal' title='edit'><i class='fa-solid fa-pen'></i></a><a class='btn py-0 text-danger col-auto delete-user-btn' data-id='".$value['id']."' title='delete'><i class='fa-solid fa-trash'></i></a>";
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
                        $tableArray[$key]['action'] = "<a class='btn py-0 text-warning col-auto' data-id='".$value['id']."' data-set='".json_encode($value)."' data-bs-toggle='modal' data-bs-target='#updateStaffFormModal' title='edit'><i class='fa-solid fa-pen'></i></a><a class='btn py-0 text-danger col-auto delete-user-btn' data-id='".$value['id']."' title='delete'><i class='fa-solid fa-trash'></i></a>";
                    }
                    $Result['status'] = 200;
                    $Result['result'] = $tableArray;
                }
                break;

            case 'add':
                if( !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['dob']) || !isset($_POST['user_type']) || !isset($_POST['active']) ) {
                    $Result['status'] = 400;
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
                     $same_user = findUser($usrname);
                    if($same_user){
                        $Result['status'] = 400;
                        $Result['error'] = 'Same Username Exist!';
                    }else{ 
                        $Result['status'] = 200;
                        $Result['result'] = insertUser( $first_name, $last_name, $nic, $gender, $dob, $contact_no, $email, $usrname, $passwrd, $user_type, $active );
                    }
                }
                break;
                
            case 'update':
                if( !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['nic']) || !isset($_POST['gender']) || !isset($_POST['dob']) ) {
                    $Result['status'] = 500;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                     $user_id = $_POST["id"];
                     $first_name = $_POST['firstname'];
                     $last_name = $_POST['lastname'];
                     $nic = $_POST['nic'];
                     $contact_no = $_POST['contactno'];
                     $email = $_POST['email'];
                     $gender = $_POST['gender'];
                     $dob = $_POST['dob'];
                     $data = [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'nic' => $nic,
                        'contact_no' => $contact_no,
                        'email' => $email,
                        'gender' => $gender,
                        'dob' => $dob,
                    ];
                    $Result["result"] = updateUser($_POST["id"],$data);
                }
                break;
                
            case 'delete':
                if( !isset($_POST['id']) ) {
                    $Result['status'] = 400;
                    $Result['error'] = 'Missing Required Data!';
                }
                else {
                    $user_id = $_POST["id"];
                    $Result['status'] = 200;
                    $Result["result"] = deleteUser($user_id);
                }
                break;

            default:
               $Result['error'] = 'Function '.$_POST['function'].' Not Found!';
               break;
        }

    }

    echo json_encode($Result);

?>