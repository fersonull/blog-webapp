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

    <?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostService;

    $postController = new PostService;

    $result = $postController->getPostByID(id: $_GET['pid']);
    ?>

    <div class="mt-4">
        <div class="container-fluid px-lg-5">
            <a href="/blog/">
                <button class="mb-3 btn rounded-0 border-0">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </button>
            </a>
            <div class="row">

                <!-- Blogs column -->
                <div class="col-lg-9">

                    <!-- blog cards -->
                    <div class="row">
                        <?php foreach ($result as $post): ?>
                            <div class="col-12 mb-4">
                                <div class="card border-0 rounded-0" style="overflow: hidden;">
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center"
                                            style="overflow: hidden; max-height: 22rem;">
                                            <img src="app/assets/img/kim.jpeg" alt="" class="rounded-0 object-fit-cover w-100 h-100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-md-0">
                                                <p class="mb-3 fs-8 poppins-bold text-uppercase">
                                                    <a href=""><?= $post['username'] ?></a> | 
                                                    <span class="opacity-75">
                                                        <?= $post['date_created'] ?>
                                                    </span>
                                                </p>
                                                <div>
                                                    <h3 class="card-title link-underline-primary text-decoration-none fs-3 fw-bold text-gray-20">
                                                        <?= $post['title'] ?>
                                                    </h3>
                                                    <p class="card-text fs-8 text-gray-20 fst-italic">
                                                        <?= $post['subtitle'] ?>
                                                    </p>
                                                </div>
                                                <p class="card-text poppins-regular fs-7 text-start" style="white-space: pre-line;">
                                                    <?= $post['content'] ?>
                                                </p>

                                                <div class="d-flex gap-2 mt-4 fs-8">
                                                    <a href="" class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">
                                                        <?= $post['tags'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>

                <!-- Comments -->
                <div class="col-lg-3">
                    <div class="card rounded-0 border-0 bg-body-tertiary">
                        <div class="card-header fw-bold">
                            <span class="text-gray-100">
                                19
                            </span>
                            <span class="fs-7">
                                comments
                            </span>
                        </div>
                        <div class="card-body">

                            <!-- Comments -->
                            <div class="card border-b rounded-0">
                                <div class="card-header text-uppercase poppins-bold fs-8">
                                    <a href="">
                                        Jasfer Monton
                                    </a>
                                    <span class="text-lowercase poppins-regular fst-italic">says,</span>
                                </div>
                                <div class="card-body">
                                    <p class="card-text fs-7">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat accusamus officia tempore voluptatum sed recusandae voluptas aut temporibus illum suscipit?
                                    </p>
                                    <p class="card-text poppins-bold fs-8 text-uppercase text-end text-gray-100">apr 24, 2004 | 12:23</p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <?= !isset($_SESSION['user_id']) ?  "<a href='' class='fs-7'>Login to comment</a>" : "" ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>