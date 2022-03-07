<?php require_once "core/auth.php"; ?>
<?php require_once "core/base.php"; ?>
<?php require_once "core/functions.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link rel="manifest" href="<?php echo $url; ?>/manifest.json">
</head>
<body>

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

<section class="main container-fluid">
    <div class="row">
        <!--        sidebar start-->
        <?php include "template/sidebar.php"; ?>
        <!--        sidebar end-->
        <div class="col-12 col-lg-9 col-xl-10 vh-100 py-3 content">
            <div class="row header mb-4">
                <div class="col-12">
                    <div class="p-2 bg-primary d-flex justify-content-between align-items-center rounded">
                        <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                            <i class="fa fa-list text-light" style="font-size: 2em;"></i>
                        </button>
                        <p style="font-size: 1.5rem;" class="text-white mb-0">550 MCH MDY</p>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?php echo $url; ?>/assets/img/<?php echo $_SESSION['user']['photo'] ?>" class="user-img shadow-sm" alt="">
                                <span class="d-none d-md-inline"><?php echo $_SESSION['user']['name']; ?></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><span class="d-block d-md-none"><i class="fa fa-user me-2 text-primary"></i><?php echo $_SESSION['user']['name']; ?></span></li>
                                <li><a class="dropdown-item" href="<?php echo $url; ?>/log_out.php"><i class="fa fa-sign-out-alt me-2 text-danger"></i>Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
