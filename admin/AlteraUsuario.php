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

if ($empresa == '...')
    $empresa = 'null';
    
if (isset($_POST['socio']) && $empresa != 'null')
    $socio = true;
else
    $socio = 'null';

$idPerfilUsuario = 3; // Usuario

$sql = "UPDATE usuario SET pu_id = ".$idPerfilUsuario.", emp_id = ".$empresa.", usu_nome = '".$nome."', usu_rg = '".$rg."', usu_cpf = '".$cpf."', usu_data_nascimento = STR_TO_DATE('".$dataNascimento."', '%d/%m/%Y'), usu_responsavel = null, usu_tel_responsavel = null, usu_endereco = '".$endereco."', usu_cep = '".$cep."', usu_bairro = '".$bairro."', usu_municipio = '".$municipio."', usu_area_atuacao = '".$areaAtuacao."', usu_area_interesse = '".$areaInteresse."', usu_telefone = '".$telefone."', usu_email = '".$email."', usu_senha = null, usu_socio = ".$socio." WHERE usu_cpf = '".$_GET['cpf']."'";
$query = mysqli_query($connect, $sql);
if ($query) {
    header("location: ?cpf=".$cpf."");
}