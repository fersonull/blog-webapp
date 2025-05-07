<?php
session_start();

if (!isset($_SESSION['userData'][0]['user_id'])) {
    header('location: /blog/login.php');
    exit;
}
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
    use App\Helper\Helper;
    
    
    
    $postController = new PostController;
    
    $result = $postController->getUserPosts($_GET['vid']);

    $currentUserLogged = Helper::equalToSession($_SESSION['userData'][0]['user_id'], $result[0]['user_id']);

    if ($currentUserLogged) {
        // echo 'true';
        header('location: /blog/profile.php');
        exit;
    }
    ?>

    <div class="mt-md-5 overflow-hidden">
        <div class="container-fluid px-lg-5">
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
                                <?= $result[0]['firstname'] ?> <?= $result[0]['lastname'] ?>
                            </h5>
                            <p class="poppins-regular fs-7">
                                @<?= $result[0]['username'] ?>
                            </p>
                        </div>

                        <!-- <?php if ($currentUserLogged): ?>
                            <div class="d-flex gap-md-3 gap-2">
                                <button class="btn btn-primary flex-grow-1">
                                    <i class="fas fa-plus"></i>
                                    <span class="d-inline d-md-none d-xl-inline">
                                        Add new post
                                    </span>
                                </button>
                                <button class="btn bg-body-secondary flex-grow-1">
                                    <i class="fas fa-pen"></i>
                                    <span class="d-inline d-md-none d-xl-inline">
                                        Edit profile
                                    </span>
                                </button>
                            </div>
                        <?php endif; ?> -->

                        <!-- <div class="d-flex px-2">
                            <p class="d-flex flex-column align-items-center poppins-bold text-uppercase fs-8">
                                <span class="fs-4 text-primary">
                                    <?php //count($result) ?>
                                </span>
                                Post
                            </p>
                        </div> -->
                    </div>
                </div>

                <!-- aside -->
                <div class="col-md-8 py-5 px-3 px-md-4 py-md-0">
                    <!-- <h4 class="poppins-bold fs-3 mb-4">
                        <i class="fas fa-newspaper me-2"></i>
                        Overview
                    </h4> -->

                    <div class="row">

                        <h3 class="mb-3 poppins-semibold">Recent Post</h3>
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
                                                    <?= substr($post['content'], 0, 90) ?><?= strlen($post['content']) >= 90 ? '...' : '' ?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <h3>No post yet</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>