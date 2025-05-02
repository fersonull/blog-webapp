<!DOCTYPE html>
<html lang="en">

<?php require 'app/partials/head.php' ?>

<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostService;
    
    $postController = new PostService;

    $result = $postController->fetchAllPosts();
    ?>

    <main class="mt-5">
        <div class="container-fluid px-lg-5">
            <div class="row">

                <!-- Blogs column -->
                <div class="col-12 col-lg-9">

                    <!-- blog cards -->
                    <div class="row">
                        <?php foreach ($result as $data): ?>
                            <div class="col-12 mb-4">
                                <div class="card bg-body-tertiary border-0 rounded-0" style="overflow: hidden;">
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center"
                                            style="overflow: hidden; max-height: 21.4rem;">
                                            <img src="app/assets/img/kim.jpeg" alt="" class="rounded-0 object-fit-cover w-100 h-100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body h-100">
                                                <div class="mb-3">
                                                    <h3 class="mb-2">
                                                        <a href="post.php?pid=<?= $data['post_id']; ?>" class="card-title link-underline-primary text-decoration-none fs-4 fw-bold text-gray-90">
                                                            <?= $data['title']; ?>
                                                        </a>
                                                    </h3>
                                                    <p class="text-gray-20 fst-italic fs-8">
                                                    <?= $data['subtitle']; ?>
                                                    </p>
                                                </div>
                                                <p class="card-text poppins-light fs-7">
                                                    <?= substr($data['content'], 0, 190) ?>...
                                                </p>
                                                <p class="card-text fs-8 poppins-bold text-gray-100 text-uppercase">
                                                <?= $data['username']; ?> | <?= $data['date_created'] ?>
                                                </p>
                                                <a href="post.php?pid=<?= $data['post_id']; ?>">
                                                    <button class="btn btn-outline-primary rounded-0 fs-7">Read more</button>
                                                </a>

                                                <div class="d-flex gap-2 mt-4 fs-8">
                                                    <a href="" class="bg-body-secondary px-2 py-1 text-decoration-none text-body opacity-50">
                                                        <?= $data['tags'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
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
    </main>
</body>

</html>
