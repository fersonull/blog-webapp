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

    use App\Classes\PostService;

    $postController = new PostService;

    $result = $postController->getUserPosts($_GET['vid']);
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

                        <?php if ($_SESSION['userData'][0]['user_id'] === $result[0]['user_id']): ?>
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
                        <?php endif; ?>
                    </div>
                </div>

                <!-- aside -->
                <div class="col-md-8 py-5 px-3 px-md-4 py-md-0">
                    <!-- <h4 class="poppins-bold fs-3 mb-4">
                        <i class="fas fa-newspaper me-2"></i>
                        Overview
                    </h4> -->

                    <div class="row">
                        <!-- <div class="mt-3">
                            <div class="row">
                            </div>
                        </div> -->

                        <!-- <ul class="nav nav-tabs px-2" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active border-0 text-bg-primary" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#contact-tab-pane" type="button" role="tab"
                                    aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                
                            </div>
                        </div> -->



                        <?php if (count($result) > 0): ?>
                            <?php // foreach ($result as $post): ?>
                                <!-- <div class="col-12 col-lg-4 mb-3">
                                    <div class="card rounded-0 border-0 shadow-sm">
                                        <div class="card-body">
                                            <p class="fs-7 text-gray-100 poppins-medium">
                                                <?= $post['date_created'] ?>
                                            </p>
                                            <h5 class="card-title poppins-semibold">
                                                <?= $post['title'] ?>
                                            </h5>
                                            <p class="card-text fs-7">
                                                <?= substr($post['content'], 0, 90) ?><?= strlen($post['content']) >= 90 ? '...' : '' ?>
                                            </p>
                                            <div class="d-flex gap-2 fs-8">
                                                <a href="" class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">
                                                    <?= $post['tags'] ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <?php //endforeach; ?>
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