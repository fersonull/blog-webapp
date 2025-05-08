<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<title>Blog</title>
<?php require 'app/partials/head.php' ?>

<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <?php
    require  './vendor/autoload.php';

    use App\Classes\PostController;
    
    $postController = new PostController;

    $result = $postController->searchPost($_GET['search']);


    ?>

    <main class="mt-5">
        <div class="container px-lg-5">
            <div class="card border-0 rounded-0 mb-5">
                <!-- <div class="card-body"> -->
                    <form action="/search_post.php" method="GET" class="">
                        <div class="row">
                            <div class="col-9 col-md-10 col-lg-11">
                                <input type="search" name="search" placeholder="Search topics or author" class="form-control rounded-0 shadow-none fs-7">
                            </div>
                            <div class="col-3 col-md-2 col-lg-1">
                                <button type="submit" class="btn btn-primary form-control rounded-start-0">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
            <div class="row">

                <!-- Blogs column -->
                <div class="col-12 col-lg-8">

                    <!-- blog cards -->
                    <div class="row">
                        <?php if (count($result) > 0): ?>
                            <?php foreach ($result as $data): ?>
                                <div class="col-12 mb-4">
                                    <div class="card border-0 rounded-0" style="overflow: hidden;">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center justify-content-center"
                                                style="overflow: hidden; max-height: 21.4rem; min-height: 20rem;">
                                                <img src="app/api/<?= $data['image'] ?>" alt="blog-img" class="rounded-0 object-fit-cover w-100 h-100">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body h-100 p-md-0">
                                                    <div class="mb-3">
                                                        <h3 class="mb-2">
                                                            <a href="post.php?pid=<?= $data['post_id']; ?>" class="card-title link-underline-primary text-decoration-none fs-4 fw-bold text-gray-90">
                                                                <?= $data['title']; ?>
                                                            </a>
                                                        </h3>
                                                        <p class="text-gray-20 fst-italic fs-7 poppins-semibold">
                                                        <?= $data['subtitle']; ?>
                                                        </p>
                                                    </div>
                                                    <p class="card-text poppins-light fs-7">
                                                        <?php if (strlen($data['content']) > 190):   ?>
                                                            <?= substr($data['content'], 0, 190) ?>...
                                                        <?php else: ?>
                                                            <?= $data['content'] ?>
                                                        <?php endif; ?>
                                                    </p>
                                                    <p class="card-text fs-8 poppins-bold text-gray-100 text-uppercase">
                                                        <?= $data['username']; ?> | <?= $data['date_created'] ?>
                                                    </p>
                                                    <a href="post.php?pid=<?= $data['post_id']; ?>">
                                                        <button class="btn btn-outline-primary rounded-0 fs-7">
                                                            Read more
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php else: ?>
                            <h4>No Result</h4>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Search column -->
            </div>
        </div>
    </main>
</body>

</html>
