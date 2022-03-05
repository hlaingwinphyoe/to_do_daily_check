<?php require_once "template/header.php"; ?>
<title>550 MCH Daily Tasks</title>
<?php require_once "template/sidebar.php"; ?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/listings.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Days</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-12 col-xl-8">
                        <h4 class="text-primary">
                            <i class="fa fa-calendar"></i>
                            Days
                        </h4>
                        <hr>
                        <?php

                        if(isset($_POST['add-btn'])){
                            addDay();

                        }

                        ?>
                        <form method="post">
                            <div class="mb-2">
                                <label><i class="text-primary fa fa-user-alt me-2"></i>Days</label>
                                <div class="form-floating mb-3">
                                    <input type="text" name="date" class="form-control" id="date" placeholder="date" value="<?php echo old('date') ?>">
                                    <label for="date" class="text-black-50">Day</label>
                                </div>
                                <?php if (getError('date')){ ?>
                                    <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('date'); ?></small>
                                <?php }; ?>
                            </div>

                            <div class="mb-0 mt-3">
                                <button class="btn btn-primary text-uppercase" name="add-btn"><i class="fa fa-plus me-2"></i>Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php clearError(); ?>

<?php require_once "template/footer.php"; ?>

