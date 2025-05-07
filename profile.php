<?php
session_start();

// if (!isset($_SESSION['userData'][0]['user_id'])) {
//     header('location: /blog/login.php');
//     exit;
// }


?>

<!DOCTYPE html>
<html lang="en">
<title>Blog</title>
<?php require 'app/partials/head.php' ?>

<body class="poppins-regular">
    <?php
    require_once 'app/partials/nav.php';

    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostController;

    $postController = new PostController;

    $currentUser = $_SESSION['userData'][0]['user_id'] ?? '';

    $result = $postController->getUserPosts($currentUser);

    
    ?>

    <div class="mt-md-5 overflow-hidden">
        <div class="container-fluid px-lg-5">

            <?php if (!isset($_SESSION['userData'][0]['user_id'])): ?>
                <div class="container mt-1 mx-auto w-100 text-center">
                    <div class="w-100 w-md-25 mx-auto">
                        <img src="/blog/app/assets/img/prof.png" class="w-100">
                    </div>
                    <h4 class="poppins-bold fs-2 mb-3">Login to view profile</h4>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <a href="/blog/login.php" class="btn btn-primary rounded-0 fs-5 poppins-semibold mb-2">Go to login</a>
                        <a href="/blog/" class="btn rounded-0 fs-7 ">Go back home</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile here -->
                        <div class="position-relative">
                            <div class="overflow-hidden border border-2 border-primary rounded-circle position-absolute d-flex"
                                style="width: 8rem; height: 8rem; top: 35%; left: 7%;">
                                <img src="app/assets/img/kim.jpeg" class="object-fit-cover w-100">
                            </div>
                            <div class="w-100 bg-body-secondary " style="height: 13rem;">

                            </div>
                            <div class="p-3 mt-3">
                                <h5 class="poppins-bold mt-5">
                                    <?= $_SESSION['userData'][0]['firstname'] ?>     <?= $_SESSION['userData'][0]['lastname'] ?>
                                </h5>
                                <p class="poppins-regular fs-7">
                                    @<?= $_SESSION['userData'][0]['username'] ?>
                                </p>
                            </div>
                            <div class="d-flex gap-md-3 gap-2">
                                <a href="add_post.php" class="btn btn-primary flex-grow-1">
                                    <i class="fas fa-plus"></i>
                                    <span class="d-inline d-md-none d-xl-inline">
                                        Add new post
                                    </span>
                                </a>
                                <a href="" class="btn bg-body-secondary flex-grow-1">
                                    <i class="fas fa-pen"></i>
                                    <span class="d-inline d-md-none d-xl-inline">
                                        Edit profile
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- aside -->
                    <div class="col-md-8 py-5 px-3 px-md-4 py-md-0">
                        <!-- <h4 class="poppins-bold fs-3 mb-4">
                        <i class="fas fa-newspaper me-2"></i>
                        Overview
                    </h4> -->

                        <div class="row" id="card-post">


                            <?php if (count($result) > 0): ?>
                                <?php foreach ($result as $post): ?>
                                    <div class="col-12 col-lg-4 mb-3">
                                        <a href="post.php?pid=<?= $post['post_id'] ?>" class="text-decoration-none text-body">
                                            <div class="card hover-scale rounded-0 border-0 shadow-sm">
                                                <div class="card-body">
                                                    <p class="fs-7 text-gray-100 poppins-medium">
                                                        <?= $post['date_created'] ?>
                                                    </p>
                                                    <h5 class="card-title poppins-semibold">
                                                        <?= $post['title'] ?>
                                                    </h5>
                                                    <p class="card-text fs-7 mb-2">
                                                        <?= substr($post['content'], 0, 90) ?>
                                                        <?= strlen($post['content']) >= 90 ? '...' : '' ?>
                                                    </p>
                                                    <div class="d-flex gap-2 fs-8">
                                                        <a href=""
                                                            class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">
                                                            <?= $post['tags'] ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-end">
                                                    <a href="" class="text-decoration-none me-2">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <button class="btn p-0" href="app/api/delete.php?del=<?= $post['post_id'] ?>" class="text-decoration-none" data-id="<?= $post['post_id'] ?>" id="deleteBtn">
                                                        <i class="fas fa-trash text-danger" style="pointer-events: none;"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                                    <div class="w-50">
                                        <input type="image" src="/blog/app/assets/img/post.png" class="w-100" alt="">
                                    </div>
                                    <h4 class="mb-3">Your don't have any post</h4>
                                    <!-- <a href="add_post.php" class="btn btn-outline-primary rounded-0 border-1">
                                    Create new post
                                </a> -->
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>


        </div>
    </div>

    <script src="/blog/app/api/js/delete.js" type="module"></script>

</body>

</html>