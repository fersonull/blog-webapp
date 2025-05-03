<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alwrite | Login</title>
    <?php require 'app/partials/head.php' ?>
</head>
<body class="poppins-regular">
    <main class="vh-100 d-flex align-items-center justify-content-center">

        <div class="p-4" style="max-width: 30rem;">
            <a href="" class="text-decoration-none">
                <div class="mb-3">
                    <i class="fas fa-arrow-left"></i>
                    Back
                </div>
            </a>
            <div class="d-flex align-items-center justify-content-center flex-column mb-5">
                <p class="m-0 text-primary text-decoration-none poppins-bold fs-2">
                    Alwrite
                </p>
                <p class="poppins-bold fs-4 m-0">Sign in to your account</p>
                <p class="text-decoration-none m-0">Or <a href="" class="text-decoration-none">create a new account</a></p>
            </div>
            <form action="" class="">
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Username</label>
                    <input type="text" class="form-control rounded-0 w-md-full" placeholder="Enter your username">
                </div>
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Password</label>
                    <input type="text" class="form-control rounded-0 w-md-full" placeholder="Enter your pasword">
                </div>
                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input fs-7" type="checkbox" id="remember">
                        <label for="remember" class="form-check-label fs-7">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary form-control mb-2">Sign in</button>
                <!-- <a href="#" class="form-control btn text-decoration-none border-0 btn-outline-secondary">Cancel</a> -->
            </form>
        </div>

        
    </main>
</body>
</html>

