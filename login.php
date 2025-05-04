<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alwrite | Login</title>
    <?php require 'app/partials/head.php' ?>
</head>
<body class="poppins-regular">

    <?php if (isset($err) && $err): ?> 
        <!-- <script>
            Swal.fire({
            toast: true,
            title: '<p class="text-warning m-0">Oops!</p>',
            width: '22rem',
            timer: 2000,
            timerProgressBar: true,
            html: '<p class="m-0 fs-7">' + data.message +'</p>',
            position: 'top-end',
            showConfirmButton: false,
        })
        </script> -->
    <?php endif; ?>
    
    <main class="vh-100 d-flex align-items-center justify-content-center">

        <div class="p-4" style="max-width: 30rem;">
            <a href="/blog/" class="text-decoration-none">
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

            <form method="POST" id="loginForm">
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Username</label>
                    <input type="text" class="form-control rounded-0 w-md-full" placeholder="Enter your username" name="username">
                    <div class="form-text text-end text-danger <?= (isset($validUsername) && !$validUsername) ? 'd-md-block' : 'd-none' ?>">Username is required.</div>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Password</label>
                    <input type="password" class="form-control rounded-0 w-md-full" placeholder="Enter your pasword" name="password">
                    <div class="form-text text-end text-danger <?= (isset($validPass) && !$validPass) ? 'd-md-block' : 'd-none' ?>">Password is required.</div>
                </div>
                <div class="mb-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check d-flex text-md-start">
                                <input class="form-check-input fs-8 rounded-0 shadow-none me-1" type="checkbox" id="remember">
                                <label for="remember" class="form-check-label fs-8 user-select-none">Remember me</label>
                            </div>
                        </div>
                        <div class="col-6 text-md-end justify-content-end text-center d-flex">
                            <a href="" class="fs-8">Forgot password</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary rounded-0 form-control mb-2">Sign in</button>
                <!-- <a href="#" class="form-control btn text-decoration-none border-0 btn-outline-secondary">Cancel</a> -->
            </form>
        </div>

        <script src="/blog/app/api/js/api.js"></script>
    </main>
</body>
</html>

