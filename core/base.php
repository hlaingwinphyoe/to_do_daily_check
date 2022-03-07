<?php

function con(){
    return mysqli_connect("localhost","root","","550tasks");
}



$role = ['Admin','User'];

$url = "http://{$_SERVER['HTTP_HOST']}/to_do";

date_default_timezone_set('Asia/Yangon');
