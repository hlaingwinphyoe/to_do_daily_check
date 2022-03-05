<?php require_once "template/header.php"; ?>
<title>550 MCH Daily Tasks</title>
<?php require_once "template/sidebar.php"; ?>
<div class="row">
    <div class="col-12">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Tasks</li>
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
                        <i class="fa fa-plus text-primary"></i> Create Tasks
                    </h4>
                    <a href="#" class="btn btn-outline-primary full-screen-btn">
                        <i class="fa fa-arrow-alt-circle-right"></i>
                    </a>
                </div>
                <hr>
                <?php
                if (isset($_POST['addTask'])){
                    createTask();
                }
                ?>
                <form method="post">
                    <div class="">
                        <label for="task" class="form-label">Test Type</label>
                        <div class="form-floating mb-3">
                            <input type="text" name="task" class="form-control w-50" id="task" placeholder="task" value="<?php echo old('task'); ?>">
                            <label for="task">Task</label>
                        </div>
                        <?php if (getError('task')){ ?>
                            <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('task'); ?></small>
                        <?php }; ?>
                        <div class="mb-3">
                            <label for="date" class="form-label">Select Day</label>
                            <select name="date" class="form-select w-50" id="date">
                                <option selected disabled>Select Day</option>
                                <?php foreach (days() as $c){ ?>
                                    <option value="<?php echo $c['id']; ?>"><?php echo $c['day_name']; ?></option>
                                <?php } ?>
                            </select>
                            <?php if (getError('date')){ ?>
                                <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('date'); ?></small>
                            <?php }; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary text-uppercase" name="addTask"><i class="fa fa-plus me-2"></i>Add Task</button>
                    </div>

                </form>
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

                    <?php foreach (tasks() as $c){ ?>

                        <tr>
                            <td><?php echo $c['id'] ?></td>
                            <td><?php echo $c['task_name'] ?></td>
                            <td><?php echo day($c['day_id'])['day_name']; ?></td>
                            <td>
                                <a href="task_delete.php?id=<?php echo $c['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure? You want to delete `<?php echo $c['task_name']; ?>`?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="task_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-sm btn-outline-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
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
