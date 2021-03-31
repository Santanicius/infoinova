<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check in</title>
</head>
<body>
    <?php require_once("menu.php")?>
    <h1>Check in</h1>
    <form action="" method="post">
        <label>CPF:</label>
        <input type="text" name="cpf">
        <button name="checkin">Check in / Chek out</button>
    </form>
    <?php 
        if (isset($_POST['checkin'])) {
            require_once("admin/CheckInUsuario.php");
        }
    ?>
</body>
</html>