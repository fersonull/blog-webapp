<!DOCTYPE html>
<html lang="en">
<?php require 'app/partials/head.php' ?>
<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostService;

    $postController = new PostService;

    $post_id = $_GET['pid'];

    $result = $postController->getPostByID(id: $post_id);
    ?>

    <main class="mt-4">
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
                        <?php if (!$postController->postExist($post_id)): ?>
                            <h3>No post found.</h3>
                        <?php else: ?>
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
                        <?php endif; ?>
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
    </main>
</body>
</html>