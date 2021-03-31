<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <?php require_once("menu.php")?>
    <h1>Cadastrar Usuario</h1>
    <form action="" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome"><br>
        <label>CPF:</label><br>
        <input type="text" name="cpf"><br>
        <label>RG:</label><br>
        <input type="text" name="rg"><br>
        <label>Data de nascimento:</label><br>
        <input type="text" name="dataNascimento"><br>
        <label>Responsavel:</label><br>
        <input type="text" name="responsavel"><br>
        <label>Telefone do Responsavel:</label><br>
        <input type="text" name="telResponsavel"><br>
        <label>CEP:</label><br>
        <input type="text" name="cep"><br>
        <label>Bairro:</label><br>
        <input type="text" name="bairro"><br>
        <label>Endereço:</label><br>
        <input type="text" name="endereco"><br>
        <label>Municipio:</label><br>
        <input type="text" name="municipio"><br>
        <label>Email:</label><br>
        <input type="text" name="email"><br>
        <label>Area de atuacao:</label><br>
        <input type="text" name="areaAtuacao"><br>
        <label>Area de interesse:</label><br>
        <input type="text" name="areaInteresse"><br>
        <label>Telefone:</label><br>
        <input type="text" name="telefone"><br>
        <label>Empresa:</label><br>
        <select name="empresa"><br>
            <option>...</option>
            <?php 
                require_once("admin/DB.php");
                $sql = "SELECT * FROM empresa";
                $query = mysqli_query($connect, $sql);
                $res = mysqli_fetch_array($query);

                while ($res != null) {
                    echo "<option value='".$res['emp_id']."'>". $res['emp_razao_social'] ."</option>";
                    $res = mysqli_fetch_array($query);
                }
            ?>
        </select><br>
        <input type="checkbox" name="socio" id="socio"><label for="socio">Socio</label><br>
        <button name="cadastrar">Cadastrar</button>
    </form>
    <?php 
        if (isset($_POST['cadastrar'])) {
            require_once("admin/CadastroUsuario.php");
        } 
    ?>
</body>
</html>