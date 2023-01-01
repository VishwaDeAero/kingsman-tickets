<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky py-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminDashboard'){ ?>active<?php } ?>"
                    aria-current="page" href="index.php">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminUsers'){ ?>active<?php } ?>"
                    href="users.php">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminMovies'){ ?>active<?php } ?>"
                    href="movies.php">
                    Movies & Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminSeats'){ ?>active<?php } ?>"
                    href="seats.php">
                    Seats
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminTickets'){ ?>active<?php } ?>"
                    href="tickets.php">
                    Tickets
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminNews'){ ?>active<?php } ?>" href="news.php">
                    News
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminInquiry'){ ?>active<?php } ?>"
                    href="inquiry.php">
                    Inquiries
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Main Slider
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($_SESSION["pagename"] == 'adminStaff'){ ?>active<?php } ?>"
                    href="staff.php">
                    Staff
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Monthly Reports</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Tickets
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Movies
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Users
                </a>
            </li>
        </ul>
    </div>
</nav>