<?php
session_start();

if (!isset($_SESSION['userData'][0]['user_id'])) {
    header('location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require 'app/partials/head.php' ?>
<title>Alwrite | Upload</title>
<body class="poppins-regular">
    <?php include 'app/partials/nav.php'; ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    // use App\Classes\PostService;

    // $postController = new PostService;

    // $post = $postController->getPostByID();
    ?>

    <div class="mt-md-5 overflow-hidden">
        <div class="container-fluid px-lg-5">
            <form method="POST" enctype="multipart/form-data" class="p-3" id="uploadForm">
                <a href="/" class="text-decoration-none">
                    <i class="fas fa-arrow-left mb-3"></i>
                    Back
                </a>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <!-- picture upload section -->
                        <label for="image">
                            <img src="https://fakeimg.pl/300x300?text=click+here+to+upload+image&font=bebas&font_size=20" class="w-100" id="imgPlaceholder">
                        </label>
                        <input type="file" name="image" accept="image/*" class="shadow-none rounded-0" id="image" hidden>
                    </div>

                    <div class="col-md-8 py-5 px-3 px-md-4 py-md-0">
                        <!-- form upload section -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Title</label>
                                    <input type="text" class="form-control rounded-0" placeholder="Add a catchy title" name="title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Subtitle</label>
                                    <input type="text" class="form-control rounded-0" placeholder="Add your subtitle" name="subtitle">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Content</label>
                                    <textarea name="content" class="form-control rounded-0" rows="8"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary rounded-0">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="app/api/js/upload.js" type="module"></script>
</body>
</html>