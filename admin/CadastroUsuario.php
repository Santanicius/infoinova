<?php

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$dataNascimento = $_POST['dataNascimento'];
$responsavel = $_POST['responsavel'];
$telResponsavel = $_POST['telResponsavel'];
$cep = $_POST['cep'];
$bairro = $_POST['bairro'];
$endereco = $_POST['endereco'];
$municipio = $_POST['municipio'];
$email = $_POST['email'];
$areaAtuacao = $_POST['areaAtuacao'];
$areaInteresse = $_POST['areaInteresse'];
$telefone = $_POST['telefone'];
$empresa = $_POST['empresa'];

if (!empty($nome) && !empty($cpf) && !empty($rg) && 
!empty($dataNascimento) && !empty($bairro) && !empty($endereco) && 
!empty($municipio) && !empty($email) && !empty($areaAtuacao) && 
!empty($areaInteresse) &&  !empty($telefone)) {
    require_once("DB.php");

    if ($empresa == '...')
        $empresa = 'null';
    
    if (isset($_POST['socio']) && $empresa != 'null')
        $socio = true;
    else
        $socio = 'null';

    $idPerfilUsuario = 3; // Usuario
    
    $sql = "INSERT INTO usuario (usu_id, pu_id, emp_id, usu_nome, usu_rg, usu_cpf, usu_data_nascimento, usu_responsavel, usu_tel_responsavel, usu_endereco, usu_cep, usu_bairro, usu_municipio, usu_area_atuacao, usu_area_interesse, usu_telefone, usu_email, usu_senha, usu_socio) VALUES (null, ".$idPerfilUsuario.", ".$empresa.", '".$nome."', '".$rg."', '".$cpf."', STR_TO_DATE('".$dataNascimento."', '%d/%m/%Y'), null, null, '".$endereco."', '".$cep."', '".$bairro."', '".$municipio."', '".$areaAtuacao."', '".$areaInteresse."', '".$telefone."', '".$email."', null, ".$socio.")";
    $query = mysqli_query($connect, $sql);
    
    if ($query) {
        echo "Usuario cadastrado";
    } else {
        echo "Nao foi possivel cadastar usuario";
    }
} else {
    echo "Preencha todos os campos";
}