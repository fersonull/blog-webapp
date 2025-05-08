<?php
function isActive($url) {
    return $url === parse_url($_SERVER['REQUEST_URI'])['path'];
}
?>

<nav class="navbar navbar-expand-md bg-body-tertiary sticky-top">
    <div class="container-fluid p-3 px-lg-5">
        <!-- <div class="p-3 bg-secondary rounded-circle d-md-none">

        </div> -->
        <a class="navbar-brand text-primary poppins-bold" href="#">
            Alwrite
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon fs-6"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item poppins-semibold">
                    <a class="nav-link d-flex align-items-center justidy-content-center <?= isActive("/") ? 'text-primary' : 'text-gray-100'?>" aria-current="page" href="/">
                        <i class="fas fa-home fs-7 me-1 d-md-none"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item poppins-semibold">
                    <a class="nav-link d-flex align-items-center justidy-content-center <?= isActive("/profile.php") ? 'text-primary' : 'text-gray-100'?>" aria-current="page" href="profile.php">
                        <i class="fas fa-user fs-7 me-1 d-md-none"></i>
                        Profile
                    </a>
                </li>
                <form class="d-flex mt-2 d-md-none" role="search">
                    <input class="form-control shadow-none rounded-0 me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary rounded-start-0" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </ul>
        </div>

        <?php if (isset($_SESSION['userData'][0]['user_id'])): ?>
            <a href="profile.php" class="bg-secondary bg-primary rounded-circle d-none d-md-block overflow-hidden" style="width: 2.5rem; height: 2.5rem;">
                <img src="app/assets/img/kim.jpeg" width="100%" class="object-fit-cover">
            </a>    
        <?php else: ?>
            <a href="login.php" class="btn btn-primary rounded-0 px-3 fs-7 d-md-block d-none">Login</a> 
        <?php endif; ?>

        
    </div>
</nav>