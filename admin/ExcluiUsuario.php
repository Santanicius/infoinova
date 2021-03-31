<?php

$cpf = $_GET['cpf'];
$sql = "SELECT usu_id FROM usuario WHERE usu_cpf = '".$cpf."'";
$query = mysqli_query($connect, $sql);

$usu_id = mysqli_fetch_assoc($query)['usu_id'];

$sql = "DELETE FROM check_in WHERE usu_id = '".$usu_id."'";
$query = mysqli_query($connect, $sql);

$sql = "DELETE FROM usuario WHERE usu_id = '".$usu_id."'";
$query = mysqli_query($connect, $sql);

header("location: pesquisarusuario.php");