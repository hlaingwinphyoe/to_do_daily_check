<?php require_once "template/header.php"; ?>
<title>550 MCH Daily Tasks</title>
<?php require_once "template/sidebar.php"; ?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listings</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fa fa-list text-primary"></i> Listings
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>

                <hr>
                <table class="table table-hover mt-3 mb-0">
                    <thead>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Day</th>
                    <th>Action</th>
                    <th>Created</th>
                    </thead>
                    <tbody>

                    <?php foreach (listings() as $c){ ?>

                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['task_name'] ?></td>
                            <td><?php echo day($c['day_id'])['day_name']; ?></td>
                            <td>
                                <?php
                                if ($c['status'] == 0){
                                    echo '<p><a class="btn btn-success" href="statusActive.php?id='.$c['id'].'">DONE</a></p>';
                                }else{
                                    echo '<p><a class="btn btn-danger" href="statusDeActive.php?id='.$c['id'].'">NOT FINISHED</a></p>';
                                }

                                ?>
                            </td>
                            <td><?php echo showTime($c['created_at']); ?></td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php clearError(); ?>

<?php require_once "template/footer.php"; ?>

<script>
    $(".table").dataTable({
        "order": [[1, "asc" ]]
    });
</script>
