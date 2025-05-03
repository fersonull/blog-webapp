<!DOCTYPE html>
<html lang="en">
<head>
    <title>Alwrite | Login</title>
    <?php require 'app/partials/head.php' ?>
</head>
<body class="poppins-regular">

    <?php if (isset($ok) && !$ok): ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: '<p class="text-primary m-0">Alwrite</p>',
                html: '<p class=" m-0">Please fill all required fields</p>',
                timer: 2000,
                timerProgressBar: true,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                customClass: {
                    toast: 'swal-rounded-0'
                },
                didOpen: () => {
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log("I was closed by the timer");
                }
            });
        </script>
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
            <form action="/blog/app/auth/auth_login.php" method="POST" class="">
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Username</label>
                    <input type="text" class="form-control rounded-0 w-md-full" placeholder="Enter your username" name="username">
                </div>
                <div class="mb-4">
                    <label for="" class="form-label poppins-bold fs-7 text-uppercase">Password</label>
                    <input type="text" class="form-control rounded-0 w-md-full" placeholder="Enter your pasword" name="password">
                </div>
                <div class="mb-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-check d-flex text-md-start">
                                <input class="form-check-input fs-8 rounded-0 shadow-none me-1" type="checkbox" id="remember">
                                <label for="remember" class="form-check-label fs-8 user-select-none">Remember me</label>
                            </div>
                        </div>
                        <div class="col-6 text-md-end text-center d-flex">
                            <a href="" class="fs-8">Forgot password</a>
                        </div>
                    </div>
                </div>
                <button type="submit" name="login" class="btn btn-primary rounded-0 form-control mb-2">Sign in</button>
                <!-- <a href="#" class="form-control btn text-decoration-none border-0 btn-outline-secondary">Cancel</a> -->
            </form>
        </div>

        
    </main>
</body>
</html>

