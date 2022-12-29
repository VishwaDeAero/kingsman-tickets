<?php
// Redirect to Login If User not Logged in
if(!isset($_SESSION["user"])){
    header('Location: ../login.php');
    die();
}else{
    $usertype = $_SESSION["user"]["user_type"];
    if($usertype == 'user'){
        header('Location: ../index.php');
        die(); 
    }
}

// Signout Function
if(isset($_POST['signoutBtn'])) {
   unset ($_SESSION["user"]);
   header('Location: ../login.php');
}
?>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 d-md-inline d-none" href="#">Cineflix Admin Panel</a>
    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="d-flex nav-item align-items-center justify-content-end">
            <div class="text-light">
                Howdy <?php echo $_SESSION["user"]["first_name"]?>!
            </div>
            <div class="text-nowrap">
                <form method="POST">
                    <button class="nav-link btn px-3" type="submit" name="signoutBtn" value="signoutBtn">Sign
                        out</button>
                </form>
            </div>
        </div>
    </div>
</header>