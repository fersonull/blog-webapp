<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="app/assets/fonts/fonts.css">
    <link rel="stylesheet" href="app/assets/css/custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <div class="mt-5">
        <div class="container-fluid px-lg-5">
            <div class="row">

                <!-- Blogs column -->
                <div class="col-12 col-lg-9">

                    <!-- blog cards -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card bg-body-tertiary border-0 rounded-0" style="overflow: hidden;">
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center"
                                        style="overflow: hidden; max-height: 22rem;">
                                        <img src="app/assets/img/kim.jpeg" alt="" class="rounded-0 object-fit-cover w-100 h-100">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body h-100">
                                            <div class="mb-3">
                                                <h3 class="mb-2">
                                                    <a href="#" class="card-title link-underline-primary text-decoration-none fs-4 fw-bold text-gray-90">
                                                        CAN I LAY BY YOUR SIDE? AND MAKE SURE YOU'RE ALRIGHT
                                                    </a>
                                                </h3>
                                                <p class="text-gray-20 fst-italic fs-8">
                                                    A letter for my pretty gf, Kimberly.
                                                </p>
                                            </div>
                                            <p class="card-text poppins-light fs-7">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore cumque
                                                deserunt nulla laborum omnis assumenda autem, maiores temporibus rerum
                                                suscipit dignissimos officiis, praesentium perferendis ipsa itaque
                                                repellendus pariatur? Corporis, ratione.
                                            </p>
                                            <p class="card-text fs-8 poppins-bold text-gray-100 text-uppercase">
                                                jasfer monton | apr 24, 2025
                                            </p>
                                            <a href="post.php">
                                                <button class="btn btn-outline-primary rounded-0 fs-7">Read more</button>
                                            </a>

                                            <div class="d-flex gap-2 mt-4 fs-8">
                                                <a href="" class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">#pet</a>
                                                <a href="" class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">#cute</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search column -->
                <div class="col-12 col-lg-3">
                    <div class="card border-0 rounded-0 bg-body-tertiary">
                        <div class="card-body">
                            <input type="search" placeholder="Search topics" class="form-control rounded-0 shadow-none fs-7">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>