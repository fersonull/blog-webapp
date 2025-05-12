<?php
session_start();

if (isset($_SESSION['userData'][0]['user_id'])) {
    header('location: /');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alwrite | Login</title>
    <?php require 'app/partials/head.php' ?>
</head>
<body class="poppins-regular">
    
    <main class="min-vh-100 d-flex align-items-center justify-content-center">

        <div class="p-4">
            <a href="/" class="text-decoration-none">
                <div class="mb-3">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </div>
            </a>
            <div class="d-flex align-items-center justify-content-center flex-column mb-5">
                <p class="m-0 text-primary text-decoration-none poppins-bold fs-2">
                    Alwrite
                </p>
                <p class="poppins-bold fs-4 m-0">Create a new account</p>
                <p class="text-decoration-none m-0">Or <a href="login.php" class="text-decoration-none">sign in with your account</a></p>
            </div>

            <form method="POST" id="signupForm" class="my-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label for="" class="form-label poppins-bold fs-7 text-uppercase">First name</label>
                            <input type="text" class="form-control rounded-0" placeholder="Enter your first name" name="firstname">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label for="" class="form-label poppins-bold fs-7 text-uppercase">Last name</label>
                            <input type="text" class="form-control rounded-0" placeholder="Enter your last name" name="lastname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-4">
                            <label for="" class="form-label poppins-bold fs-7 text-uppercase">Username</label>
                            <input type="text" class="form-control rounded-0" placeholder="Enter your username" name="username">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label for="" class="form-label poppins-bold fs-7 text-uppercase">Password</label>
                            <input type="password" class="form-control rounded-0" placeholder="Enter your password" name="password">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-4">
                            <label for="" class="form-label poppins-bold fs-7 text-uppercase">Confirm password</label>
                            <input type="password" class="form-control rounded-0" placeholder="Confirm your password" name="confirm_pass">
                        </div>
                    </div>
                </div>

                <!-- <div>
                    <div class="form-check d-flex text-md-start">
                        <input class="form-check-input fs-8 rounded-0 shadow-none me-1" type="checkbox" id="remember">
                        <label for="remember" class="form-check-label fs-8 user-select-none">Show password</label>
                    </div>
                </div> -->
                
                <!-- <hr> -->
                
                <div class="mb-4">
                </div>
                <button type="submit" class="btn btn-primary rounded-0 form-control mb-2">Register</button>
                <!-- <a href="#" class="form-control btn text-decoration-none border-0 btn-outline-secondary">Cancel</a> -->
            </form>
        </div>

        <script src="app/api/js/signup.js" type="module"></script>
    </main>
</body>
</html>

