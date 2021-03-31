<?php
require_once("admin/DB.php");
$cpf = $_GET['cpf'];

$sql = "SELECT usu_cpf FROM usuario WHERE usu_cpf = '".$cpf."'";
$query = mysqli_query($connect, $sql);
if (mysqli_num_rows($query)) {
    header("location: /usuario.php?cpf=".$cpf."");
} else {
    echo "Usuario nao encontrado";
}