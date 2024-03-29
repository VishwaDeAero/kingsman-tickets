<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-yellow">
        <div class="container-fluid">
            <!-- Brand Name and Logo -->
            <a href="index.php" class="navbar-brand"><strong>Kingsman Tickets</strong></a>
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
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'allmovies'){ ?>active<?php } ?>"href="#">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'aboutus'){ ?>active<?php } ?>" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'contactus'){ ?>active<?php } ?>" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SESSION["pagename"] == 'myaccount'){ ?>active<?php } ?>" href="#">My Account</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn btn-outline-dark">Sign In</a>
                    <a href="register.php" class="ms-2 btn btn-outline-dark">Register</a>
                </div>
            </div>
        </div>
    </nav>