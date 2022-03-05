<?php
// common start
function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}

function alert($data,$color="danger"){
    return "<p class='alert alert-$color'>$data</p>";
}

function redirect($l){
    echo "<script>location.href = '$l'</script>";
}

function textFilter($text){
    $text = strip_tags($text);
    $text = htmlentities($text,ENT_QUOTES);
    $text = stripslashes($text);

    return $text;
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}


function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function clearError(){
    $_SESSION['error']= [];
}

function runQuery($sql){
    $con = con();
    if(mysqli_query($con,$sql)){
        return true;
    }else{
        die("Query Fail : ".mysqli_error($con));
    }
}

function fetch($sql){
    $query = mysqli_query(con(),$sql);
    $row = mysqli_fetch_assoc($query);
    return $row;
}

function fetchAll($sql){
    $query = mysqli_query(con(),$sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($rows,$row);
    }
    return $rows;
}

function showTime($timestamp,$format = "j M, Y"){
    return date($format,strtotime($timestamp));
}


// common end

// auth start

function register(){

    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";

    if(empty($_POST['name'])){
        setError("name","Name is required!");
        $errorStatus=1;
    }else{
        if(strlen($_POST['name']) < 5){
            setError("name","Name is too short!");
            $errorStatus=1;
        }else{
            if(strlen($_POST['name']) > 20){
                setError("name","Name is too long!");
                $errorStatus=1;
            }else{
                if (!preg_match("/^[a-zA-Z 0-9' ]*$/",$_POST['name'])) {
                    setError('name',"Only letters and white space allowed!");
                    $errorStatus=1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['phone'])){
        setError("phone","Phone Number is required!");
        $errorStatus=1;
    }else{
        if (!preg_match("/^[0-9 ]*$/",$_POST['phone'])) {
            setError('phone',"Only numbers allowed!");
            $errorStatus=1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    if (empty($_POST['password'])){
        setError("password","Password is required!");
        $errorStatus=1;
    }else{
        $sPass = password_hash($_POST['password'],PASSWORD_DEFAULT);

    }

    if (!$errorStatus){
        $sql = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$sPass')";
        if (runQuery($sql)){
            redirect("user_list.php");
        }
    }

}

function login(){
    $errorStatus =0;
    $email = "";
    $check = "";

    if(empty($_POST['email'])){
        setError("email","Email is required");
        $errorStatus=1;
    }else{
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Email format incorrect");
            $errorStatus=1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['password'])){
        setError("password","Password is required!");
        $errorStatus=1;
    }else{
        $password = textFilter($_POST['password']);
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query(con(),$sql);
        $row = mysqli_fetch_assoc($query);

        if (!$row){
            return alert("Email or Password don't match");
        }else{
            if(!password_verify($password,$row['password'])){

                return alert("Email or Password don't match");

            }else{
                session_start();
                $_SESSION['user'] = $row;
                redirect("listings.php");

            }
        }
    }

}

// auth end

// user start

function user($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    return fetch($sql);
}

function users(){
    $sql = "SELECT * FROM users";
    return fetchAll($sql);
}

function userDelete($id){
    $sql = "DELETE FROM users WHERE id=$id";
    return runQuery($sql);
}

// user end

// day start

function addDay(){
    $errorStatus = 0;
    $date = "";

    if (empty($_POST['date'])) {
        setError("date", "Day name is required!");
        $errorStatus = 1;
    } else {
        $date = textFilter(strip_tags($_POST['date']));
    }

    if (!$errorStatus){
        $user_id = $_SESSION['user']['id'];

        $sql = "INSERT INTO days (day_name,user_id) VALUES ('$date','$user_id')";

        if(runQuery($sql)){
            redirect("date.php");
        }
    }

}

function day($id){
    $sql = "SELECT * FROM days WHERE id=$id";
    return fetch($sql);
}

function days(){
    $sql = "SELECT * FROM days";
    return fetchAll($sql);
}

// day end


// task start

function createTask(){
    $errorStatus = 0;
    $task = "";

    if (empty($_POST['task'])) {
        setError("task", "Test name is required!");
        $errorStatus = 1;
    } else {
            $task = textFilter(strip_tags($_POST['task']));
    }

    if (empty($_POST['date'])) {
        setError("date", "Day is required!");
        $errorStatus = 1;
    } else {
        $day = textFilter(strip_tags($_POST['date']));
    }

    if (!$errorStatus){
        $user_id = $_SESSION['user']['id'];

        $sql = "INSERT INTO tasks (task_name,day_id,user_id) VALUES ('$task','$day','$user_id')";

        if(runQuery($sql)){
            redirect("create.php");
        }
    }

}

function task($id){
    $sql = "SELECT * FROM tasks WHERE id=$id";
    return fetch($sql);
}

function tasks(){
    $sql = "SELECT * FROM tasks";
    return fetchAll($sql);
}

function taskDelete($id){
    $sql = "DELETE FROM tasks WHERE id=$id";
    return runQuery($sql);
}

function taskUpdate(){
    $errorStatus = 0;
    $newTask = "";

    if (empty($_POST['task'])) {
        setError("task", "Task name is required!");
        $errorStatus = 1;
    } else {
            $newTask = textFilter(strip_tags($_POST['task']));
    }

    if (empty($_POST['date'])) {
        setError("date", "Day is required!");
        $errorStatus = 1;
    } else {
        $newDay = textFilter(strip_tags($_POST['date']));
    }

    if (!$errorStatus){
        $id = $_POST['id'];
        $sql = "UPDATE tasks SET task_name='$newTask',day_id='$newDay' WHERE id=$id";

        if(runQuery($sql)){
            redirect("create.php");
        }
    }
}

// task end

// task listing start

function listings(){
    $sql = "SELECT * FROM tasks WHERE status='0'";
    return fetchAll($sql);
}

function completeListings(){
    $sql = "SELECT * FROM tasks WHERE status='1'";
    return fetchAll($sql);
}

function statusActive($id){
    $sql = "UPDATE tasks SET status ='1' WHERE id=$id";
    return runQuery($sql);
}

function statusDeActive($id){
    $sql = "UPDATE tasks SET status ='0' WHERE id=$id";
    return runQuery($sql);
}

function resetAll(){
    $sql = "UPDATE tasks SET status ='0'";
    return runQuery($sql);
}


// task listing end
