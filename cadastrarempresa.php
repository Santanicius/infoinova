<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <?php require_once("menu.php")?>
    <h1>Cadastrar Empresa</h1>
    <form action="" method="post">
        <label>Razao social:</label><br>
        <input type="text" name="razaoSocial"><br>
        <label>CNPJ:</label><br>
        <input type="text" name="cnpj"><br>
        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br>
        <label>Ramo de atuacao:</label><br>
        <input type="text" name="areaAtuacao"><br>
        
        <button name="cadastrar">Cadastrar</button>
    </form>
    <?php 
        if (isset($_POST['cadastrar'])) {
            require_once("admin/CadastroEmpresa.php");
        } 
    ?>
</body>
</html>