<?php
// Redirect to Login If User not Logged in
if(!isset($_SESSION["user"])){
    header('Location: login.php');
    die();
}else{
    $usertype = $_SESSION["user"]["user_type"];
    if($usertype == 'user'){
        header('Location: ../index.php');
        die(); 
    }
}
?>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 d-md-inline d-none" href="#">Cineflix Admin Panel</a>
    <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="d-flex nav-item align-items-center justify-content-end">
            <div class="text-light">
                Howdy Admin!
            </div>
            <div class="text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </div>
</header>