<?php require_once "template/header.php"; ?>
<title>550 MCH Daily Tasks</title>
<?php require_once "template/sidebar.php"; ?>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="fas fa-clipboard-check text-primary"></i> Tasks Listings
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>

                <hr>
                <?php if ($_SESSION['user']['role'] == 0){ ?>
                <div class="mb-3 text-end">
                    <a href="reset.php" class="text-uppercase btn btn-danger"><img src="<?php echo $url; ?>/assets/img/reload.png" style="width: 20px; margin-right: 10px" alt="">Reset</a>
                </div>
                <?php } ?>
                <table class="table table-hover mt-3 mb-0">
                    <thead>
                    <th>Tasks</th>
                    <th>Status</th>
                    </thead>
                    <tbody>

                    <?php foreach (tasks() as $c){ ?>

                        <tr>
                            <td><?php echo $c['task_name'] ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                        <?php if ($c['status'] == '1'){echo "checked";} ?>
                                           onclick="toggleStatus(<?php echo $c['id']; ?>)"
                                           type="checkbox" role="switch" id="check">
                                </div>
                            </td>
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
