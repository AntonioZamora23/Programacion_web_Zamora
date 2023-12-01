<?php

$host_db="sql205.infinityfree.com";
$user_db="if0_35173744";
$pass_db="DZt9F6M4CEa";
$db_name="if0_35173744_cupra_php";

try{
    $conexion = new PDO("mysql:host=$host_db;db_name=$db_name",$user_db,$pass_db);
} catch(Exception $e){
    echo $e->getMessage();
}

?>