<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Usuario</title>
</head>
<body>
    <?php require_once("menu.php")?>
    <h1>Consulta Usuario</h1>
    <form action="" method="post">
    <?php 
        require_once("admin/DB.php");
        $sql = "SELECT * FROM usuario WHERE usu_cpf = '".$_GET['cpf']."'";
        $query = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($query);
        if (!isset($_GET['alterar'])) {
            $alterar = 'disabled';
        } else {
            $alterar = "type='text'";
        }
        ?>
        <label>Nome:</label><br>
        <input <?=$alterar?> name="nome" <?="value='".$row['usu_nome']."'"?>><br>
        <label>CPF:</label><br>
        <input <?=$alterar?> name="cpf" <?="value='".$row['usu_cpf']."'"?>><br>
        <label>RG:</label><br>
        <input <?=$alterar?> name="rg" <?="value='".$row['usu_rg']."'"?>><br>
        <label>Data de nascimento:</label><br>
        <input <?=$alterar?> name="dataNascimento" <?="value='".date("d/m/Y", strtotime($row['usu_data_nascimento']))."'"?>><br>
        <label>Responsavel:</label><br>
        <input <?=$alterar?> name="responsavel" <?="value='".$row['usu_responsavel']."'"?>><br>
        <label>Telefone do Responsavel:</label><br>
        <input <?=$alterar?> name="telResponsavel" <?="value='".$row['usu_tel_responsavel']."'"?>><br>
        <label>CEP:</label><br>
        <input <?=$alterar?> name="cep" <?="value='".$row['usu_cep']."'"?>><br>
        <label>Bairro:</label><br>
        <input <?=$alterar?> name="bairro" <?="value='".$row['usu_bairro']."'"?>><br>
        <label>Endereço:</label><br>
        <input <?=$alterar?> name="endereco" <?="value='".$row['usu_endereco']."'"?>><br>
        <label>Municipio:</label><br>
        <input <?=$alterar?> name="municipio" <?="value='".$row['usu_municipio']."'"?>><br>
        <label>Email:</label><br>
        <input <?=$alterar?> name="email" <?="value='".$row['usu_email']."'"?>><br>
        <label>Area de atuacao:</label><br>
        <input <?=$alterar?> name="areaAtuacao" <?="value='".$row['usu_area_atuacao']."'"?>><br>
        <label>Area de interesse:</label><br>
        <input <?=$alterar?> name="areaInteresse" <?="value='".$row['usu_area_interesse']."'"?>><br>
        <label>Telefone:</label><br>
        <input <?=$alterar?> name="telefone" <?="value='".$row['usu_telefone']."'"?>><br>
        <label>Empresa:</label><br>
        <select name="empresa" <?=$alterar?>><br>
            <option>...</option>
            <?php 
                $sql = "SELECT * FROM empresa";
                $query = mysqli_query($connect, $sql);
                $res = mysqli_fetch_array($query);

                while ($res != null) {
                    if ($row['emp_id'] == $res['emp_id']) 
                        echo "<option selected value=".$res['emp_id'].">".$res['emp_razao_social']." </option>";
                    else
                        echo "<option value='".$res['emp_id']."'>". $res['emp_razao_social'] ."</option>";
                    $res = mysqli_fetch_array($query);
                }
            ?>
        </select><br>
        <input type="checkbox" name="socio" id="socio" <?=$alterar?> <?=$row['usu_socio'] ? "checked" : '';?>><label for="socio">Socio</label><br>
        <?php 
            if (isset($_GET['alterar'])) {
                echo "<button name='confirmar'>Confirmar</button>";
                echo "<button name='cancelar'>Cancelar</button>";
                if (isset($_POST['confirmar'])) {
                   require_once("admin/AlteraUsuario.php");
                }
                if (isset($_POST['cancelar'])) {
                    header("location: ?cpf=".$row['usu_cpf']."");
                }
            } 
            else if (isset($_GET['excluir'])) {
                echo "<button name='sim'>Sim</button>";
                echo "<button name='nao'>Nao</button>";
                if (isset($_POST['sim'])) {
                    require_once("admin/ExcluiUsuario.php");
                }
                if (isset($_POST['nao'])) {
                    header("location: ?cpf=".$row['usu_cpf']."");
                }
            }
            else {
                echo "<button name='alterar'>Alterar</button>";
                echo "<button name='excluir'>Excluir</button>";
                if (isset($_POST['alterar'])) {
                    header("location: ?cpf=".$row['usu_cpf']."&alterar=enabled");
                }
                if (isset($_POST['excluir'])) {
                    header("location: ?cpf=".$row['usu_cpf']."&excluir=enabled");
                }
            }
        ?>
    </form>
</body>
</html>