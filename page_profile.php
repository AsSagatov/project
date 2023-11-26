<?php

require_once "functions.php";
$user = get_account_by_id($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>
    <body class="mod-bg-1 mod-nav-link">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
            <a class="navbar-brand d-flex align-items-center fw-500" href="users.php"><img alt="logo" class="d-inline-block align-top mr-2" src="img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="users.php">Главная</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="page_login.php">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="unlog.php">Выйти</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main id="js-page-content" role="main" class="page-content mt-3">
            <div class="subheader">
                <h1 class="subheader-title">
                    <i class='subheader-icon fal fa-user'></i> <?php echo $user["username"];?>
                </h1>
            </div>
            <div class="row">
              <div class="col-lg-6 col-xl-6 m-auto">
                    <!-- profile summary -->
                    <div class="card mb-g rounded-top">
                        <div class="row no-gutters row-grid">
                            <div class="col-12">
                                <div class="d-flex flex-column align-items-center justify-content-center p-4">
                                    <?php if(empty($user["user_image"])):?>
                                        <img src="uploads/avatar-m.png" class="rounded-circle shadow-2 img-thumbnail" alt="" width="200">
                                    <?php else:?>
                                        <img src="<?php echo $user["user_image"];?>" class="rounded-circle shadow-2 img-thumbnail" alt="" width="200">
                                    <?php endif;?>
                                    <h5 class="mb-0 fw-700 text-center mt-3">
                                        <?php echo $user["username"];?>
                                        <small class="text-muted mb-0"><?php echo $user["address"];?></small>
                                    </h5>
                                    <div class="mt-4 text-center demo">
                                        <a href="javascript:void(0);" class="fs-xl" style="color:#C13584">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="fs-xl" style="color:#4680C2">
                                            <i class="fab fa-vk"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="fs-xl" style="color:#0088cc">
                                            <i class="fab fa-telegram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 text-center">
                                        <?php if(!empty($user["telephone_number"])):?>
                                            <a href="tel:+13174562564" class="mt-1 d-block fs-sm fw-400 text-dark">
                                            <i class="fas fa-mobile-alt text-muted mr-2"></i> <?php echo $user["telephone_number"];?></a>
                                        <?php endif;?>
                                    <a href="mailto:<?php echo $user["email"];?>" class="mt-1 d-block fs-sm fw-400 text-dark">
                                        <i class="fas fa-mouse-pointer text-muted mr-2"></i> <?php echo $user["email"];?></a>
                                        <?php if(!empty($user["telephone_number"])):?>
                                            <address class="fs-sm fw-400 mt-4 text-muted">
                                            <i class="fas fa-map-pin mr-2"></i> <?php echo $user["address"];?>
                                        <?php endif;?>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </main>
    </body>

    <script src="js/vendors.bundle.js"></script>
    <script src="js/app.bundle.js"></script>
    <script>

        $(document).ready(function()
        {

        });

    </script>
</html>