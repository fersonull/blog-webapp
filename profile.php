<!DOCTYPE html>
<html lang="en">    
<?php require 'app/partials/head.php' ?>
<body class="poppins-regular">
    <?php require_once 'app/partials/nav.php' ?> 

    <?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostService;

    $postController = new PostService;

    $result = $postController->getUserPosts(10000);
    ?>

    <div class="mt-5">
        <div class="container-fluid px-lg-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card rounded border-2 border-primary bg-body-tertiary">
                        <img src="https://placehold.co/400" alt="" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title text-gray-100 poppins-bold">
                                Profile here
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 p-3">
                    <h4 class="poppins-bold fst-italic mb-4">
                        <i class="fas fa-newspaper me-2"></i>
                        Your recent posts
                    </h4>

                    <div class="row">
                        <?php foreach ($result as $post): ?>
                            <div class="col-12 col-lg-4 mb-3">
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
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
