<?php

function con(){
    return mysqli_connect("localhost","root","","550tasks");
}

$info = array(
  "name" => "550 MCH Daily Tasks",
  "short" => "550 MCH",
  "description" => "Tasks",
);


$role = ['Admin','User'];

$url = "http://{$_SERVER['HTTP_HOST']}/to_do";

date_default_timezone_set('Asia/Yangon');