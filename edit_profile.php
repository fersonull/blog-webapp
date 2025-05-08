<?php
session_start();

if (!isset($_SESSION['userData'][0]['user_id'])) {
    header('location: /profile.php');
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
    use App\Classes\UserController;

    $postController = new PostController;
    $userController = new UserController;

    $currentUser = $_SESSION['userData'][0]['user_id'] ?? '';

    $user = $userController->getuser($currentUser);
    ?>

    <div class="mt-md-5 overflow-hidden">
        <div class="container-fluid px-lg-5">

            <?php if (!isset($_SESSION['userData'][0]['user_id'])): ?>
                <div class="container mt-1 mx-auto w-100 text-center">
                    <div class="w-100 w-md-25 mx-auto">
                        <img src="app/assets/img/prof.png" class="w-100">
                    </div>
                    <h4 class="poppins-bold fs-2 mb-3">Login to view profile</h4>
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <a href="/login.php" class="btn btn-primary rounded-0 fs-5 poppins-semibold mb-2">Go to login</a>
                        <a href="/" class="btn rounded-0 fs-7 ">Go back home</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="row mt-5 mt-md-2">
                    <div class="col d-md-flex  flex-column align-items-center justify-content-center">
                        <!-- Profile here -->
                        <div class="position-relative w-md-full">
                            <a href="/profile.php">
                                <i class="fas fa-arrow-left mb-2"></i>
                                Back
                            </a>
                            <div class="w-100 mb-2">
                                <h3>Edit profile</h3>
                            </div>
                            <form method="POST" id="editProfileForm" class="shadow-sm">
                                <label for="imageInp" class="overflow-hidden border border-2 border-primary rounded-circle position-absolute d-flex"
                                    style="width: 8rem; height: 8rem; top: 40%; left: 7%;">
                                    <img src="/app/api/<?= $user[0]['user_profile'] ?? 'https://fakeimg.pl/300x300?text=add+photo&font=bebas&font_size=60' ?>" class="object-fit-cover w-100" id="imgPlaceholder">
                                </label>
                                <input type="file" accept="image/*" name="image" id="imageInp" hidden>
                                <div class="w-100 bg-body-secondary " style="height: 13rem;">

                                </div>
                                <div class="p-3 mt-3">
                                    <div class="p-3 mt-3">
                                        <h5 class="poppins-bold mt-1">
                                            <?= $_SESSION['userData'][0]['firstname'] ?> <?= $_SESSION['userData'][0]['lastname'] ?>
                                        </h5>
                                        <p class="poppins-regular fs-7">
                                            @<?= $_SESSION['userData'][0]['username'] ?>
                                        </p>
                                    </div>
                                    <div class="d-flex gap-md-3 gap-2 mt-4">
                                        <button type="submit" class="btn btn-primary rounded-0 form-control">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- aside -->
                    
                </div>
            <?php endif ?>


        </div>
    </div>

    <script src="/app/api/js/update.js" type="module"></script>

</body>

</html>