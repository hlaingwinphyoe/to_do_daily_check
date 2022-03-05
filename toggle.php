<?php

    require_once "core/auth.php";
    require_once "core/base.php";

    $id = $_POST['id'];

    $sql = "SELECT * FROM tasks WHERE id=$id";
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);

    $status = $row['status'];

    if ($status == '1'){
        $status = '0';
    }else{
        $status = '1';
    }

    $finalSql = "UPDATE tasks SET status='$status' WHERE id=$id";
    $result = mysqli_query(con(),$finalSql);

    if ($result){
        echo $status;
    }

?>
