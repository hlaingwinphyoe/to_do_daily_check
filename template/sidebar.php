<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="p-2 rounded d-flex justify-content-center align-items-center mr-2">
<!--                <i class="fas fa-user text-white h4 mb-0"></i>-->
                <img src="<?php echo $url; ?>/assets/img/logo.png" style="width: 40px" alt="">
            </span>
            <span class="font-weight-bolder h4 mb-0  text-primary ms-2">Tasks Daily Report</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="fa fa-times text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-spacer"></li>

            <li class="text-black-50 mb-2">
                <span>Tasks</span>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/listings" class="menu-item-link">
                    <span>
                        <i class="fa fa-clipboard-check text-primary"></i>
                        Tasks Listings
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>

            <?php if ($_SESSION['user']['role'] ==0){ ?>

            <li class="text-black-50 mb-2">
                <span>Setting</span>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/create" class="menu-item-link">
                <span>
                    <i class="fa fa-plus text-primary"></i>
                    Create Tasks
                </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/users" class="menu-item-link">
                    <span>
                        <i class="fa fa-users text-primary"></i>
                        Users
                    </span>
                </a>
            </li>
            <?php } ?>

            <hr>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/log_out.php" class="btn btn-danger w-100">
                    <i class="fa fa-sign-out-alt"></i>
                    Log out
                </a>
            </li>

        </ul>
    </div>
</div>