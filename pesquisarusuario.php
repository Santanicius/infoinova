<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Usuario</title>
</head>
<body>
    <?php require_once("menu.php")?>
    <h1>Pesquisar Usuario</h1>
    <form action="" method="get">
    <label>CPF:</label>
    <input type="text" name="cpf">
    <button>Pesquisar</button>
    </form>
    <?php 
        if (isset($_GET['cpf'])) {
            require_once("admin/PesquisaUsuario.php");
        }
    ?>
</body>
</html>