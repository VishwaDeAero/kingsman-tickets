<?php
// Signout Function
if(isset($_POST['signoutBtn'])) {
    unset ($_SESSION["user"]);
    header('Location: login.php');
}
?>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-yellow">
        <div class="container-fluid">
            <!-- Brand Name and Logo -->
            <a href="index.php" class="navbar-brand"><strong>Cineflix Movies</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'home'){ ?>active<?php } ?>" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'allmovies'){ ?>active<?php } ?>"href="allmovies.php">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'allnews'){ ?>active<?php } ?>"href="news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'aboutus'){ ?>active<?php } ?>" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'contactus'){ ?>active<?php } ?>" href="contactus.php">Contact Us</a>
                    </li>
                    <!-- Show Only when logged in -->
                    <?php
                        if(isset($_SESSION["user"])){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'myaccount'){ ?>active<?php } ?>" href="myaccount.php">My Account</a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="d-flex">
                    <!-- Change Buttons when user logged in -->
                    <?php
                        if(!isset($_SESSION["user"])){
                    ?>
                            <a href="login.php" class="btn btn-outline-dark">Sign In</a>
                            <a href="register.php" class="ms-2 btn btn-outline-dark">Register</a>
                    <?php
                        }
                        else{
                    ?>
                            <p class="m-auto pe-3">Hello <?php echo $_SESSION["user"]['first_name'] ?>!</p>
                            <form method="POST">
                                <button type="submit" name="signoutBtn" class="btn btn-outline-dark">Sign Out</button>
                            </form>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>