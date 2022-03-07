<?php

require_once "core/base.php";
require_once "core/functions.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <!-- Primary Meta Tags -->
    <meta name="title" content="Daily General Workers Tasks">
    <meta name="description" content="Daily Task for General Workers">
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/img/icons/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/img/icons/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/img/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/icons/android-chrome-192x192.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/img/icons/android-chrome-512x512.png">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://general-workers.com/">
    <meta property="og:title" content="Daily General Workers Tasks">
    <meta property="og:description" content="Daily Task for General Workers">
    <meta property="og:image" content="https://general-workers.com/assets/img/icons/favicon.ico">

    <link rel="icon" href="<?php echo $url; ?>/assets/img/logo.png">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link rel="manifest" href="<?php echo $url; ?>/manifest.json">
</head>
<body style="background: var(--bs-light)">

<script>
    if("serviceWorker in navigator"){
        navigator.serviceWorker.register("sw.js").then(registration =>{
            console.log("SW Registered!");
            console.log(registration);
        }).catch(error => {
            console.log("SW Registration Failed!");
            console.log(error);
        })
    }
</script>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7 d-none d-lg-block">
                            <img src="<?php echo $url; ?>/assets/img/login.jpg" class="w-100" alt="">
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="mt-4">
                                <img src="<?php echo $url; ?>/assets/img/default.png" class="register-img mt-4" alt="">
                            </div>
                            <h4 class="text-center text-primary">
                                <i class="feather-users"></i>
                                Admin Log In
                            </h4>
                            <?php

                            if(isset($_POST['login-btn'])){
                                login();
                            }

                            ?>
                            <form method="post">
                                <div class="mb-2">
                                    <label><i class="text-primary fa fa-phone-alt me-2"></i>Email</label>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="email" value="<?php echo old('email') ?>">
                                        <label for="email" class="text-black-50">Email</label>
                                    </div>
                                    <?php if (getError('email')){ ?>
                                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('email'); ?></small>
                                    <?php }; ?>
                                </div>
                                <div class="mb-2">
                                    <label><i class="text-primary fa fa-lock me-2"></i>Password</label>
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                        <label for="password" class="text-black-50">Password</label>
                                    </div>
                                    <?php if (getError('password')){ ?>
                                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('password'); ?></small>
                                    <?php }; ?>
                                </div>

                                <div class="form-group mb-0 mt-3">
                                    <button class="btn btn-primary text-uppercase" name="login-btn"><i class="fa fa-sign-in-alt me-2"></i>LogIn</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php clearError(); ?>

<script src="<?php echo $url; ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
