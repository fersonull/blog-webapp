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
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/blog/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link" href="profile.php">Profile</a>
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