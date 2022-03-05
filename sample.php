<?php require_once "template/header.php"; ?>
<title>550 MCH Daily Tasks</title>
<?php require_once "template/sidebar.php"; ?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Completed Listings</li>
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
                        <i class="fas fa-clipboard-check text-primary"></i> Completed Listings
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>

                <hr>
                <div class="mb-3">
                    <a href="reset.php" class="text-uppercase btn btn-danger"><img src="<?php echo $url; ?>/assets/img/reload.png" style="width: 20px; margin-right: 10px" alt="">Reset</a>
                </div>
                <table class="table table-hover mt-3 mb-0">
                    <thead>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Day</th>
                    <th>Action</th>
                    <th>Created</th>
                    </thead>
                    <tbody>

                    <?php foreach (tasks() as $c){ ?>

                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['task_name'] ?></td>
                            <td><?php echo day($c['day_id'])['day_name']; ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                        <?php if ($c['status'] == '1'){echo "checked";} ?>
                                           onclick="toggleStatus(<?php echo $c['id']; ?>)"
                                           type="checkbox" role="switch" id="check">
                                </div>
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
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-1.9.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
    $(".table").dataTable({
        "order": [[1, "asc" ]]
    });

    function toggleStatus(id){
        var id = id;
        $.ajax({
            url : "toggle.php",
            type : "post",
            data : {id :id},
            success : function (result){
                if (result == '1'){
                    swal("Done!","status is ON","success");
                }else{
                    swal("Done!","status is OFF","success");
                }
            }
        });
    }
</script>
