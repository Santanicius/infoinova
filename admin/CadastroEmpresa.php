<?php

$razaoSocial = $_POST['razaoSocial'];
$cnpj = $_POST['cnpj'];
$telefone = $_POST['telefone'];
$areaAtuacao = $_POST['areaAtuacao'];

if (!empty($razaoSocial) && !empty($cnpj) && !empty($telefone) && !empty($areaAtuacao)) {
    require_once("DB.php");
    $sql = "INSERT INTO empresa VALUES (null, '".$razaoSocial."', '".$cnpj."', '".$telefone."', '".$areaAtuacao."')";
    $query = mysqli_query($connect, $sql);
    
    if ($query) {
        echo "Empresa cadastrada";
    } else {
        echo "Nao foi possivel cadastrar empresa";
    }
} else {
    echo "Preencha todos os campos";
}