<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php require 'app/partials/head.php' ?>

<title>Alwrite</title>
<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    use App\Classes\PostController;
    use App\Classes\CommentController;

    $postController = new PostController;
    $commController = new CommentController;

    $post_id = $_GET['pid'];
    $currentUser = $_SESSION['userData'][0]['user_id'] ?? '';

    if (isset($_POST['post_comm'])) {
        $commController->addComment($post_id, $currentUser, $_POST['comm_content']);
    }

    $post = $postController->getPostByID($post_id);
    $comments = $commController->getCommentsByPost($post_id);


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
                <div class="col-lg-9 mb-5">

                    <!-- blog cards -->
                    <div class="row">
                        <?php if (!$postController->postExist($post_id)): ?>
                            <h3>No post found.</h3>
                        <?php else: ?>
                            <div class="col-12 mb-4">
                                <div class="card border-0 rounded-0" style="overflow: hidden;">
                                    <div class="row">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center"
                                            style="overflow: hidden; max-height: 22rem;">
                                            <img src="app/api/<?= $post['image'] ?>" alt="" class="rounded-0 object-fit-cover w-100 h-100">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body p-md-0">
                                                <p class="mb-3 fs-8 poppins-bold text-uppercase">
                                                    <a href="view_profile.php?vid=<?= $post['user_id'] ?>"><?= $post['username'] ?></a> | 
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
                        <?php endif; ?>
                    </div>

                </div>

                <!-- Comments -->
                <div class="col-lg-3 mb-3">
                    <div class="card rounded-0 border-0 bg-body-tertiary">
                        <div class="card-header fw-bold">
                            <span class="text-gray-100">
                                <?= count($comments) ?>
                            </span>
                            <span class="fs-7">
                                comments
                            </span>
                        </div>
                        <div class="card-body">
                            <div style="max-height: 20rem; overflow: auto;">

                                <?php if (count($comments) > 0): ?>
                                    <?php foreach ($comments as $comms): ?>
                                        <div class="card border-b rounded-0 mb-3">
                                            <div class="card-header text-uppercase poppins-bold fs-8">
                                                <a href="view_profile.php?vid=<?= $comms['user_id'] ?>">
                                                    <?= $comms['username'] ?>
                                                </a>
                                                <span class="text-lowercase poppins-regular fst-italic">says,</span>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text fs-7">
                                                    <?= $comms['content'] ?>
                                                </p>
                                                <p class="card-text poppins-bold fs-8 text-uppercase text-end text-gray-100">
                                                    <?= $comms['date'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="card border-0 rounded-0 bg-body-tertiary">
                                        <div class="card-body text-center">
                                            <p class="card-text poppins-semibold">No comments</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Comments -->
                        </div>
                        <div class="card-footer text-center">
                            <?php if (isset($_SESSION['userData'][0]['user_id'])): ?>
                                <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>?pid=<?= $post['post_id'] ?>" class="d-flex">
                                    <textarea name="comm_content" id="comm" rows="1" class="form-control rounded-0 shadow-none flex-grow-1"></textarea>
                                    <button type="submit" name="post_comm" class="btn btn-primary rounded-start-0 flex-grow-1 d-flex align-items-center justify-content-center">
                                        <i class="fas fa-paper-plane text-white"></i>
                                    </button>
                                </form>
                            <?php else: ?>
                                <a href="/blog/login.php" class="text-center">Login to comment</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>